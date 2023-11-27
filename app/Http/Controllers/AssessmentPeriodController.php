<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentPeriodRequest;
use App\Http\Traits\CommonTrait;
use App\Models\AssessmentPeriod;
use App\Models\AssessmentPeriodUser;
use App\Services\AssessmentPeriod\AssessmentPeriodService;
use Illuminate\Http\Request;

class AssessmentPeriodController extends Controller
{
    protected AssessmentPeriodService $assessmentPeriodService;

    use CommonTrait;

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
        $data['listApCopy'] = $this->assessmentPeriodService->listApCopy();
        return view('assessmentPeriod.step_1', $data);
    }

    public function store(AssessmentPeriodRequest $request)
    {
        $data = $this->assessmentPeriodService->createAssessmentPeriod($request->all());
        return redirect()->route("assessmentPeriod.step2", $data->id)->with('success', 'Create success!');
    }

    public function step2($id)
    {
        $data['assessmentPeriod'] = $this->assessmentPeriodService->findAssessmentPeriod($id);
        $data['departments'] = $this->listDepartments();
        $data['jobTitles'] = $this->listJobTitles();
        $data['users'] = $this->listUsers();
        return view('assessmentPeriod.step_2', $data);
    }

    public function updateStep2($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->assessmentPeriodService->updateStep2($id, $request->all());
        return redirect()->route("assessmentPeriod.step3", [$id])->with('success', 'Update success!');
    }

    public function step3($id)
    {
        $data['users'] = AssessmentPeriodUser::where('assessment_id', $id)
            ->with(['user','user.getJobTitle','user.getDepartment','user.getManagement'])->get();
        return view('assessmentPeriod.step_3', $data);
    }

    public function updateStep3($id, Request $request): \Illuminate\Http\RedirectResponse
    {dd($request->all());
        $this->assessmentPeriodService->updateStep3($id, $request->all());
        return redirect()->route("assessmentPeriod.show", [$id])->with('success', 'Update success!');
    }

    public function getListUser(Request $request): bool|string
    {
        $data['users'] = $this->assessmentPeriodService->getListUser($request->all());
        return json_encode(['code' => '200','html' => view('assessmentPeriod.list_user', $data)->render()]);
    }

    public function getListReviewer(Request $request): bool|string
    {
        $data['users'] = $this->assessmentPeriodService->getListUser($request->all());
        $data['userInfo'] = $request->userInfo;
        return json_encode(['code' => '200','html' => view('assessmentPeriod.reviewer', $data)->render()]);
    }

    public function addReviewer(Request $request): bool|string
    {
        $data['users'] = $this->assessmentPeriodService->getListUser($request->all());
        return json_encode(['code' => '200','html' => view('assessmentPeriod.reviewer_table', $data)->render()]);
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

        return json_encode([
            'code' => 200,
            'success' => 'Xóa thành công!'
        ]);
    }
}
