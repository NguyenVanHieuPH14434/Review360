<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentPeriodRequest;
use App\Http\Traits\CommonTrait;
use App\Models\AssessmentPeriod;
use App\Models\AssessmentPeriodReviewer;
use App\Models\AssessmentPeriodUser;
use App\Models\User;
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
            ->with(['user','user.getJobTitle','user.getDepartment','user.getManagement', 'reviewers','reviewers.user'])->get();
        $data['id'] = $id;
        return view('assessmentPeriod.step_3', $data);
    }

    public function updateStep3($id, Request $request)
    {
        $this->assessmentPeriodService->updateStep3($id, $request->all());
        return json_encode(['code' => '200']);
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
        $data['nvtdg'] = AssessmentPeriodReviewer::query()
            ->where('assessment_period_user_id', $request->userInfo['id'])
            ->where('user_id', $request->userInfo['user_id'])->first();

        $data['reviewers'] = AssessmentPeriodReviewer::query()
            ->where('assessment_period_user_id', $request->userInfo['id'])->get();

        return json_encode(['code' => '200','html' => view('assessmentPeriod.reviewer', $data)->render()]);
    }

    public function addReviewer(Request $request): bool|string
    {
        $data['users'] = $this->assessmentPeriodService->getListUser($request->all());
        $data['number_tr']= $request->number_tr;
        return json_encode(['code' => '200','html' => view('assessmentPeriod.reviewer_table', $data)->render()]);
    }

    public function edit($id)
    {
        $data['assessmentPeriod'] = $this->assessmentPeriodService->findAssessmentPeriod($id);
        return view('assessmentPeriod.update_step1',  $data);
    }

    public function updateStep01($id, AssessmentPeriodRequest $request)
    {
        $this->assessmentPeriodService->updateStep01($id, $request->all());
        return redirect()->route("assessmentPeriod.editStep2", $id)->with('notice', ['success', 'Update success!']);
    }

    public function editStep2($id)
    {
        $data['router'] = \Request::route()->getName();
        $data['assessmentPeriod'] = $this->assessmentPeriodService->findAssessmentPeriod($id);
        $data['departments'] = $this->listDepartments();
        $data['jobTitles'] = $this->listJobTitles();
        $data['users'] = $this->listUsers();

        $data['departmentSelected'] = $data['assessmentPeriod']->departments != '' ? json_decode($data['assessmentPeriod']->departments,true) : [];
        $data['jobTitleSelected'] = $data['assessmentPeriod']->jobTitles != '' ? json_decode($data['assessmentPeriod']->jobTitles,true) : [];
        $data['userSelected'] = $data['assessmentPeriod']->levels != '' ? json_decode($data['assessmentPeriod']->levels,true) : [];
        $data['levelSelected'] = $data['assessmentPeriod']->users != '' ? json_decode($data['assessmentPeriod']->users,true) : [];

        $userAp = AssessmentPeriodUser::where('assessment_id', $id)->pluck('user_id');
        $data['users'] = User::whereIn('id', $userAp)
            ->with(['getDepartment','getJobTitle','getManagement'])->get();

        return view('assessmentPeriod.update_step2', $data);
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
