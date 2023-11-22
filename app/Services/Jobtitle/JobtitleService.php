<?php

namespace App\Services\Jobtitle;

use LaravelEasyRepository\BaseService;

interface JobTitleService extends BaseService{

    public function listJobTitle($searchData, $limit);

    public function findJobTitle($id);

    public function creatJobTitle($data);

    public function generateJobTitleCode();

    public function updateJobTitle($id, $data);

    public function getAllJobTitle();
}
