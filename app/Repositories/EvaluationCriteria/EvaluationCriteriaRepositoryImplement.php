<?php

namespace App\Repositories\EvaluationCriteria;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\EvaluationCriteria;

class EvaluationCriteriaRepositoryImplement extends Eloquent implements EvaluationCriteriaRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(EvaluationCriteria $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
    public function getLatestEvalCriteria()
    {
        return $this->model::orderByDesc('id')->latest()->value('id');
    }

    public function allEvalCriteria()
    {
        return $this->model::latest()->paginate(10);
    }
}
