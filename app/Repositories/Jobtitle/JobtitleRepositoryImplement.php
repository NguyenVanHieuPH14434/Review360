<?php

namespace App\Repositories\Jobtitle;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Jobtitle;

class JobtitleRepositoryImplement extends Eloquent implements JobtitleRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Jobtitle $model)
    {
        $this->model = $model;
    }
    // Write something awesome :)
}
