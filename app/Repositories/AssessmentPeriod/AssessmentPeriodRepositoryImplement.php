<?php

namespace App\Repositories\AssessmentPeriod;

use App\Models\User;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\AssessmentPeriod;

class AssessmentPeriodRepositoryImplement extends Eloquent implements AssessmentPeriodRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
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

}
