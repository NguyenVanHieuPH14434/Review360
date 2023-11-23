<?php

namespace App\Services\EvaluationCriteria;

use LaravelEasyRepository\BaseService;

interface EvaluationCriteriaService extends BaseService{

    public function listEvalCriteria();

    public function findEvalCriteria($id);

    public function createEvalCriteria($data);

    public function updateEvalCriteria($id, $data);

    public function deleteEvalCriteria($id);

    public function generateCode();
}
