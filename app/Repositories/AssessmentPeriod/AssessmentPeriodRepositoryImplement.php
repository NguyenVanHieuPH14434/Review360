<?php

namespace App\Repositories\AssessmentPeriod;

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

}
