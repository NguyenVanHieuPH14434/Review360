<?php

namespace App\Repositories\Department;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Department;

class DepartmentRepositoryImplement extends Eloquent implements DepartmentRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    const LIMIT_PERPAG = 10;

    public function __construct(Department $model)
    {
        $this->model = $model;
    }

    public function listDepartment($searchData, $limit)
    {
        $limit = ! is_null($limit) ? $limit : self::LIMIT_PERPAG;
        $qb = $this->model;
        $departmentCode = $searchData['departmentCode'] ?? null;
        $title= $searchData['title'] ?? null;
        if(! empty($searchData)) {
            if($title) {
                $qb = $qb->where('title', 'like', "%" . $title . "%");
            }
            if($departmentCode) {
                $qb = $qb->where('department_code', 'like', "%" . $departmentCode . "%");
            }
        }

        return $qb->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->paginate($limit);
    }

    public function getLatestDepartment()
    {
        return $this->model::orderByDesc('id')->latest()->value('id');
    }
}
