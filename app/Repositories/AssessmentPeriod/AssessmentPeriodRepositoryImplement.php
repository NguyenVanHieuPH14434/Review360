<?php

namespace App\Repositories\AssessmentPeriod;

use App\Models\AssessmentPeriodUser;
use App\Models\EvalForm;
use App\Models\EvaluationCriteria;
use App\Models\User;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\AssessmentPeriod;

class AssessmentPeriodRepositoryImplement extends Eloquent implements AssessmentPeriodRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected AssessmentPeriod $model;
    const Active = 1;


    public function __construct(AssessmentPeriod $model)
    {
        $this->model = $model;
    }

    public function allAssessmentPeriod()
    {
        return $this->model::latest()->paginate(10);
    }

    public function listAP()
    {
        return $this->model::latest()->where('status',self::Active)->whereNull('deleted_at')->pluck('title','id');
    }

    public function getListUser($data){
        $users = User::where('status',self::Active)->whereNull('deleted_at');

        if (!empty($data['departments'])) {
            $users->whereIn('users.department_id', $data['departments']);
        }

        if (!empty($data['jobTitles'])) {
            $users->whereIn('users.job_title_id', $data['jobTitles']);
        }

        if (!empty($data['levels'])) {
            $users->whereIn('users.level', $data['levels']);
        }

        if (!empty($data['users'])) {
            $users->whereIn('users.id', $data['users']);
        }

        if(!empty($data['userid'])){
            is_array($data['userid']) ? $users->whereNotIn('id', $data['userid']) :  $users->where('id','<>',$data['userid']);
            return $users->with(['getJobTitle','getDepartment','getManagement'])->pluck('name','id');
        }else{
            return $users->with(['getJobTitle','getDepartment','getManagement'])->get();
        }
    }

    public function getListEmpReview($asID) {
        return AssessmentPeriodUser::where('assessment_id',$asID)->with(['user','user.getJobTitle','user.getDepartment'])->get();
    }

    public function getEmpReview($id, $asID){
        $user = User::with(['getJobTitle','getDepartment','getManagement'])->find($id);
        $evalForm = EvalForm::where(['job_title_id' => $user->job_title_id])->whereNull('department_id')
            ->whereNull('level_id')->whereNull('user_id')
            ->with('evalFormCri')->first();

        $reviewers =AssessmentPeriodUser::select('assessment_period_user.total_point_job_rank',
            'apr.result as result_review','apr.weighting','users.name','apr.principal_reviewer',
            'users.code','users.id','assessment_period_user.rank_job_rank','assessment_period_user.total_point_performance',
        'assessment_period_user.rank_performance','assessment_period_user.status','assessment_period_user.calendar_assess',
        'assessment_period_user.assessment_completion_date','assessment_period_user.result', 'apr.result_job_rank')
            ->join('assessment_period_reviewer as apr','apr.assessment_period_user_id','=','assessment_period_user.id')
            ->join('users','users.id','=','apr.user_id')
            ->where(['assessment_period_user.assessment_id' => $asID, 'assessment_period_user.user_id' => $id])
            ->get()->toArray();

        $idCris = $dataCri =  [];

        if($evalForm != '' && count($evalForm->evalFormCri) > 0) {
            foreach ($evalForm->evalFormCri as $item) {
                $idCris[] = $item->criteria_id;
            }
        }

        $evalCris = EvaluationCriteria::whereIn('id', $idCris)->with(['evalCriPoint','catCri'])->get();

        foreach ($evalCris as $evalCri) {
            if(!array_key_exists($evalCri->type_criteria, $dataCri)){
                $dataCri[$evalCri->type_criteria] = [];
            }

            if(!array_key_exists($evalCri->cat_criteria,$dataCri[$evalCri->type_criteria])){
                $dataCri[$evalCri->type_criteria][$evalCri->cat_criteria] = ['cat_title' => $evalCri->catCri->title];
            }


            $dataCri[$evalCri->type_criteria][$evalCri->cat_criteria][$evalCri->id] = [
                'criteria_code' => $evalCri->criteria_code,
                'title' => $evalCri->title,
                'points' => []
            ];

            foreach ($evalCri->evalCriPoint as $item) {
                $dataCri[$evalCri->type_criteria][$evalCri->cat_criteria][$evalCri->id]['points'][] =[
                    'point' => $item->point,
                    'description' => $item->description
                ];
            }
        }

        return ['user' => $user, 'dataCri' => $dataCri, 'reviewers' => $reviewers];
    }

}
