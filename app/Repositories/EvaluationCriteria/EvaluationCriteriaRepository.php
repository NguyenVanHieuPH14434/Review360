<?php

namespace App\Repositories\EvaluationCriteria;

use LaravelEasyRepository\Repository;

interface EvaluationCriteriaRepository extends Repository{

    // Write something awesome :)
    public function create($data);
    public function getLatestEvaluationCriteria();
}
