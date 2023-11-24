<?php

namespace App\Services\AssessmentPeriod;

use LaravelEasyRepository\Service;
use App\Repositories\AssessmentPeriod\AssessmentPeriodRepository;

class AssessmentPeriodServiceImplement extends Service implements AssessmentPeriodService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(AssessmentPeriodRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function listAssessmentPeriod(){
        return $this->mainRepository->allAssessmentPeriod();
    }

    public function findAssessmentPeriod($id)
    {
        return $this->mainRepository->find($id);
    }

    public function createAssessmentPeriod($data)
    {
        return $this->mainRepository->create($data);
    }

    public function updateStep2($id, $data)
    {
        return $this->mainRepository->update($id, $data);
    }

    public function getListUser($data){
        return $this->mainRepository->getListUser($data);
    }

    public function deleteAssessmentPeriod($id)
    {
        return $this->mainRepository->delete($id);
    }

    public function listApCopy(){
        return $this->mainRepository->listAP();
    }
}
