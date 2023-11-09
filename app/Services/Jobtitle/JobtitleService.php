<?php

namespace App\Services\Jobtitle;

use LaravelEasyRepository\BaseService;

interface JobTitleService extends BaseService{

    public function listJobTitle();
}
