<?php

namespace App\Services\EvaluationCriteria;

use LaravelEasyRepository\BaseService;

interface EvaluationCriteriaService extends BaseService{

    // Write something awesome :)
    public function listCategoryCriteria();
    public function createEvaluationCriteria($data);
}
