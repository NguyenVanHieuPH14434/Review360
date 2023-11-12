<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Http\Requests\JobTitleRequest;
use App\Imports\ImportJobTitle;
use App\Services\Jobtitle\JobtitleService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JobTitleController extends Controller
{
    protected JobtitleService $jobTitleService;
    public function __construct(JobtitleService $jobTitleService)
    {
        $this->jobTitleService = $jobTitleService;
    }

    public function index(Request $request) {
        $perPage = $request->has('per_page') ? $request->query("per_page") : null;
        $listJobTitle = $this->jobTitleService->listJobTitle([], $perPage);
        return view("jobTitle.index", [
            'listJobTitle' => $listJobTitle
        ]);
    }

    public function search(Request $request) {
        if (
            $request->has('title') && ! empty($request->query('title')) ||
            $request->has('jobTitleCode') && ! empty($request->query('jobTitleCode'))
        ) {
            $perPage = $request->has('per_page') ? $request->query("per_page") : null;
            $listJobTitle = $this->jobTitleService->listJobTitle($request->query(), $perPage);
            return view("jobTitle.index", [
                'listJobTitle' => $listJobTitle
            ]);
        }
       return redirect()->route("jobTitle.list");
    }

    public function create()
    {
        return view('jobTitle.create');
    }

    public function store(JobTitleRequest $request)
    {
        $jobTitle = $this->jobTitleService->creatJobTitle($request->all());
        return redirect()->route("jobTitle.show", [$jobTitle['id']])->with('success', 'Create success!');
    }

    public function show($id)
    {
        $jobTitle = $this->jobTitleService->findJobTitle($id);
        return view('jobTitle.detail',  ['jobTitle' => $jobTitle]);
    }

    public function edit($id)
    {
        $jobTitle = $this->jobTitleService->findJobTitle($id);
        return view('jobTitle.update', ['jobTitle' => $jobTitle]);
    }

    public function update($id, JobTitleRequest $request)
    {
        $this->jobTitleService->updateJobTitle($id, $request->all());
        return redirect()->route("jobTitle.show", [$id])->with('success', 'Update success!');;
    }

    public function importView()
    {
        return view('jobTitle.import');
    }

    public function import(ImportRequest $request)
    {
        try {
            Excel::import(new ImportJobTitle($this->jobTitleService), $request->file('file'));
            return redirect()->route("jobTitle.list")->with('success', 'Import success!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             return redirect()->back()->with('import_error', $failures);
        }
    }
}
