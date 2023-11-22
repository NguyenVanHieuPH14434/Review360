<?php

namespace App\Repositories\AssessmentSetup;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\AssessmentSetup;

class AssessmentSetupRepositoryImplement extends Eloquent implements AssessmentSetupRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(AssessmentSetup $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
    public function allAssessmentSetup()
    {
        return $this->model::latest()->paginate(10);
    }
}
