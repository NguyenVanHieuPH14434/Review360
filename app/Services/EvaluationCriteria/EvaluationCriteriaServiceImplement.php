<?php

namespace App\Services\EvaluationCriteria;

use App\Repositories\CategoryCriteria\CategoryCriteriaRepository;
use LaravelEasyRepository\Service;
use App\Repositories\EvaluationCriteria\EvaluationCriteriaRepository;

class EvaluationCriteriaServiceImplement extends Service implements EvaluationCriteriaService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $evaluationCriteriaRepository;

    public function __construct(EvaluationCriteriaRepository $evaluationCriteriaRepository)
    {
      $this->evaluationCriteriaRepository = $evaluationCriteriaRepository;
    }

    // Define your custom methods :)
    public function listCategoryCriteria(){}

    public function createEvaluationCriteria($data)
    {
      $data['criteria_code'] = $this->generateDepartmentCode();
      $this->evaluationCriteriaRepository->create($data);
    }

    public function generateDepartmentCode()
    {
        $result = $this->evaluationCriteriaRepository->getLatestEvaluationCriteria();
        return generateCode("EC", $result);
    }
}
