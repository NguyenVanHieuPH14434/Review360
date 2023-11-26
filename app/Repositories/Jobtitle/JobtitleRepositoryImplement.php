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
        $keyword = $searchData['keyword'] ?? null;
        if(! empty($searchData) && $keyword) {
            $qb = $qb->where('title', 'like', "%" . $keyword . "%")
                     ->orwhere('job_title_code', 'like', "%" . $keyword . "%");
        }

        return $qb->whereNull('deleted_at')->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->paginate($limit);
    }

    public function getLatestJobTitle()
    {
        return $this->model::orderByDesc('id')->latest()->value('id');
    }
}
