<?php

namespace App\Repositories\EvalForm;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\EvalForm;

class EvalFormRepositoryImplement extends Eloquent implements EvalFormRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(EvalForm $model)
    {
        $this->model = $model;
    }

    public function allEvalForm(){
        return $this->model::latest()->where('status', 1)->whereNull('deleted_at')
            ->with('jobTitle')->with('department')
            ->paginate(10);
    }
}
