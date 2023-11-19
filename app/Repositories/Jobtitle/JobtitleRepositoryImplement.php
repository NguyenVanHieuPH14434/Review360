<?php

namespace App\Repositories\Jobtitle;

use App\Models\JobTitle;
use LaravelEasyRepository\Implementations\Eloquent;

class JobtitleRepositoryImplement extends Eloquent implements JobtitleRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    const LIMIT_PERPAG = 10;

    public function __construct(JobTitle $model)
    {
        $this->model = $model;
    }

    public function listJobTitle($searchData, $limit)
    {
        $limit = ! is_null($limit) ? $limit : self::LIMIT_PERPAG;
        $qb = $this->model;
        $jobTitleCode = $searchData['jobTitleCode'] ?? null;
        $title= $searchData['title'] ?? null;
        if(! empty($searchData)) {
            if($title) {
                $qb = $qb->where('title', 'like', "%" . $title . "%");
            }
            if($jobTitleCode) {
                $qb = $qb->where('job_title_code', 'like', "%" . $jobTitleCode . "%");
            }
        }

        return $qb->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->paginate($limit);
    }

    public function getLatestJobTitle()
    {
        return $this->model::orderByDesc('id')->latest()->value('id');
    }
}
