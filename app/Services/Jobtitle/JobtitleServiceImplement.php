<?php

namespace App\Services\Jobtitle;

use LaravelEasyRepository\Service;
use App\Repositories\Jobtitle\JobtitleRepository;

class JobtitleServiceImplement extends Service implements JobtitleService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $jobtitleRepository;

    public function __construct(JobtitleRepository $jobtitleRepository)
    {
      $this->jobtitleRepository = $jobtitleRepository;
    }

    public function listJobTitle() {
        return $this->jobtitleRepository->all();
    }
}
