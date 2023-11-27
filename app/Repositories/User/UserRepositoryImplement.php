<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;
use Carbon\Carbon;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    const LIMIT_PERPAG = 10;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function listUser($searchData, $limit)
    {
        $limit = ! is_null($limit) ? $limit : self::LIMIT_PERPAG;
        $qb = $this->model;
        $keyword = $searchData['keyword'] ?? null;
        $workDate= $searchData['workDate'] ?? null;
        $status= $searchData['status'] ?? null;
        $jobTitleId= $searchData['job_title_id'] ?? null;
        $departmentId= $searchData['department_id'] ?? null;
        $directManagement= $searchData['direct_management'] ?? null;

        if(! empty($searchData)) {
            if($keyword) {
                $qb = $qb->where('code', 'LIKE', "%" . $keyword . "%")
                         ->orwhere('name', 'LIKE', "%" . $keyword . "%")
                         ->orwhere('email', 'LIKE', "%" . $keyword . "%");
            }
            if($jobTitleId) {
                $qb = $qb->whereIn("job_title_id", $jobTitleId);
            }
            if($departmentId) {
                $qb = $qb->whereIn("department_id", $departmentId);
            }
            if($directManagement) {
                $qb = $qb->whereIn("direct_management", $directManagement);
            }
            if($workDate) {
                $qb = $qb->where('work_start_date', Carbon::createFromFormat('d/m/Y', $workDate)->format('Y-m-d'));
            }
            if($status) {
                $qb = $qb->where('status', $status);
            }
        }

        return $qb->whereNull('deleted_at')
                  ->with(['getJobTitle', 'getDepartment', 'getManagement'])
                  ->orderBy('created_at', 'DESC')
                  ->orderBy('id', 'DESC')
                  ->paginate($limit);
    }

    public function getLatestUser()
    {
        return $this->model::orderByDesc('id')->latest()->value('id');
    }
}
