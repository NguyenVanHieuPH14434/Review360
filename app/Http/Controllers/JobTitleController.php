<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Http\Requests\JobTitleRequest;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\Handle404Trait;
use App\Imports\ImportJobTitle;
use App\Models\JobTitle;
use App\Services\Jobtitle\JobtitleService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JobTitleController extends Controller
{
    use CommonTrait;
    protected JobtitleService $jobTitleService;
    public function __construct(JobtitleService $jobTitleService)
    {
        $this->jobTitleService = $jobTitleService;
    }

    public function index(Request $request) {
        $listJobTitle = $this->jobTitleService->listJobTitle([], null);
        return view("jobTitle.index", [
            'listJobTitle' => $listJobTitle
        ]);
    }

    public function search(Request $request) {
        $req = array_filter($request->query(), function($val) {
            return $val !== null;
        });
        if (empty($req)) {
            return redirect()->route("jobTitle.list");
        }
        $listJobTitle = $this->jobTitleService->listJobTitle($request->query(), null);
        return view("jobTitle.index", [
            'listJobTitle' => $listJobTitle
        ]);
    }

    public function create()
    {
        return view('jobTitle.create');
    }

    public function store(JobTitleRequest $request)
    {
        $jobTitle = $this->jobTitleService->creatJobTitle($request->all());
        return redirect()->route("jobTitle.list")->with('notice', ['success', 'Tạo mới thành công!']);
    }

    public function show($id)
    {
        $jobTitle = $this->findOrFailAndReturn(JobTitle::class, $id) ;
        return view('jobTitle.detail',  ['jobTitle' => $jobTitle]);
    }

    public function edit($id)
    {
        $jobTitle = $this->findOrFailAndReturn(JobTitle::class, $id) ;
        return view('jobTitle.update', ['jobTitle' => $jobTitle]);
    }

    public function update($id, JobTitleRequest $request)
    {
        $this->jobTitleService->updateJobTitle($id, $request->all());
        return redirect()->route("jobTitle.list")->with('notice', ['success', 'Cập nhật thành công!']);
    }

    public function importView()
    {
        return view('jobTitle.import');
    }

    public function import(ImportRequest $request)
    {
        try {
            Excel::import(new ImportJobTitle($this->jobTitleService), $request->file('file'));
            return redirect()->route("jobTitle.list")->with('notice', ['success', 'Import thành công!']);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             return redirect()->back()->with('import_error', $failures);
        }
    }
}
