<?php

namespace App\Services\Jobtitle;

use App\Models\Jobtitle;
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

    public function listJobTitle($searchData, $limit) {
        return $this->jobtitleRepository->listJobTitle($searchData, $limit);
    }

    public function findJobTitle($id)
    {
      return $this->jobtitleRepository->find($id);
    }

    public function creatJobTitle($data)
    {
      $data['job_title_code'] = $this->generateJobTitleCode();
      return $this->jobtitleRepository->create($data);
    }

    public function generateJobTitleCode()
    {
        $result = $this->jobtitleRepository->getLatestJobTitle();
        return generateCode("JT", $result);
    }

    public function updateJobTitle($id, $data)
    {
      return $this->jobtitleRepository->update($id, $data);
    }
}
