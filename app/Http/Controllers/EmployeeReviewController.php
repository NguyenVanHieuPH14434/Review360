<?php

namespace App\Http\Controllers;

use App\Models\AssessmentPeriod;
use App\Models\AssessmentPeriodReviewer;
use App\Models\AssessmentPeriodUser;
use App\Services\AssessmentPeriod\AssessmentPeriodService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeReviewController extends Controller
{
    protected AssessmentPeriodService $assessmentPeriodService;

    public function __construct(AssessmentPeriodService $assessmentPeriodService)
    {
        $this->assessmentPeriodService = $assessmentPeriodService;
    }
    public function index() {
        $data['listAssessmentPeriod'] = $this->assessmentPeriodService->listAp();
        $assessmentPeriodActive = AssessmentPeriod::query()->where('status',1)->latest()->first();
        $data['listEmpReview'] = $this->assessmentPeriodService->listEmpReview($assessmentPeriodActive->id);
        $data['asID'] = $assessmentPeriodActive->id;
        return view("employeeReview.index",$data);
    }

    public function getListEmpReview(Request $request): bool|string
    {
        $data['asID'] = $request->asID;
        $data['listEmpReview'] = $this->assessmentPeriodService->listEmpReview($request->asID);
        return json_encode(['code' => '200','html' => view('employeeReview.list_emp_review', $data)->render()]);
    }

    public function empReview($id, $asID){
        $data['asID'] = $asID;
        $data['review'] = $this->assessmentPeriodService->getEmpReview($id, $asID);
        $data['user_id'] = $id;
        return view("employeeReview.review",$data);
    }

    public function storeEmpReview(Request $request) {
        try {
            DB::beginTransaction();

            $user_id = $request->user_id;
            $asID = $request->assessment_id;
            $apu = AssessmentPeriodUser::query()->where(['assessment_id'=> $asID,'user_id' => $user_id])->first();
            $apu->total_point_performance = $request->performance['averagePointPerformance'];
            $apu->rank_performance = $request->performance['averageRatingPerformance'];
            $apu->total_point_job_rank = $request->job_rank['averagePointJobRank'];
            $apu->rank_job_rank = $request->job_rank['averageRatingJobRank'];
            $apu->assessment_completion_date = now();
            $apu->result = json_encode(['performance' => $request->performance, 'job_rank' => $request->job_rank]);
            $apu->status = 1;
            $apu->save();

            if(!empty($request->performance)){
                $emp_perform = $request->performance['empReview'];
                $emp_job_rank = $request->job_rank['empReview'];

                foreach ($emp_perform as $key => $item){
                    $reviewer = AssessmentPeriodReviewer::query()
                        ->where(['assessment_period_user_id' => $apu->id,'user_id'=> $key])->first();
                    $reviewer->result = json_encode($item);
                    $reviewer->status = 1;
                    $reviewer->save();
                }

                foreach ($emp_job_rank as $key => $item){
                    $reviewer = AssessmentPeriodReviewer::query()
                        ->where(['assessment_period_user_id' => $apu->id,'user_id'=> $key])->first();
                    $reviewer->result_job_rank = json_encode($item);
                    $reviewer->status = 1;
                    $reviewer->save();
                }
            }

            DB::commit();
            return redirect()->route('employeeReview.showReview',['id' => $user_id,'asId' =>$asID])->with('notice', ['success', 'Update success!']);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function showReview($id, $asId){
        $data['asID'] = $asId;
        $data['review'] = $this->assessmentPeriodService->getEmpReview($id, $asId);
        $data['user_id'] = $id;
        return view("employeeReview.view",$data);
    }

}
