<?php

namespace App\Services\AssessmentSetup;

use LaravelEasyRepository\Service;
use App\Repositories\AssessmentSetup\AssessmentSetupRepository;

class AssessmentSetupServiceImplement extends Service implements AssessmentSetupService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(AssessmentSetupRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
    public function listAssessmentSetup(){
      return $this->mainRepository->allAssessmentSetup();
  }
}
