<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentPeriodRequest;
use App\Models\AssessmentPeriod;
use App\Services\AssessmentPeriod\AssessmentPeriodService;
use Illuminate\Http\Request;

class AssessmentPeriodController extends Controller
{
    protected AssessmentPeriodService $assessmentPeriodService;

    public function __construct(AssessmentPeriodService $assessmentPeriodService)
    {
        $this->assessmentPeriodService = $assessmentPeriodService;
    }

    public function index() {
        $data['listAssessmentPeriod'] = $this->assessmentPeriodService->listAssessmentPeriod();
        return view("assessmentPeriod.index", $data);
    }

    public function create()
    {
        $data['assessmentPeriod'] = new AssessmentPeriod();
        return view('assessmentPeriod.create', $data);
    }

    public function store(AssessmentPeriodRequest $request)
    {
        $data = $this->assessmentPeriodService->createAssessmentPeriod($request->all());
        return redirect()->route("assessmentPeriod.show", $data->id)->with('success', 'Create success!');
    }

    public function edit($id)
    {
        $data['assessmentPeriod'] = $this->assessmentPeriodService->findAssessmentPeriod($id);
        return view('assessmentPeriod.update', $data);
    }

    public function update($id, assessmentPeriodRequest $request)
    {
        $this->assessmentPeriodService->updateAssessmentPeriod($id, $request->all());
        return redirect()->route("assessmentPeriod.show", [$id])->with('success', 'Update success!');
    }

    public function show($id)
    {
        $data['assessmentPeriod'] = $this->assessmentPeriodService->findAssessmentPeriod($id);
        return view('assessmentPeriod.view',  $data);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        //todo: xóa tiêu chí thuộc nhóm

        if ($request->flag_del == 'delete') {
            $this->assessmentPeriodService->deleteAssessmentPeriod($id);
        }

        return json_encode(['code' => 200]);
    }
}
