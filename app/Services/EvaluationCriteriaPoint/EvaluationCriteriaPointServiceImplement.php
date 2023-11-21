<?php

namespace App\Services\EvaluationCriteriaPoint;

use LaravelEasyRepository\Service;
use App\Repositories\EvaluationCriteriaPoint\EvaluationCriteriaPointRepository;

class EvaluationCriteriaPointServiceImplement extends Service implements EvaluationCriteriaPointService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(EvaluationCriteriaPointRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
    public function create($data) {

    }
}
