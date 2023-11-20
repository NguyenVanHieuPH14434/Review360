<?php

namespace App\Repositories\CategoryCriteria;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\CategoryCriteria;

class CategoryCriteriaRepositoryImplement extends Eloquent implements CategoryCriteriaRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(CategoryCriteria $model)
    {
        $this->model = $model;
    }

    public function allCategoryCriteria()
    {
        return $this->model::latest()->paginate(10);
    }

}
