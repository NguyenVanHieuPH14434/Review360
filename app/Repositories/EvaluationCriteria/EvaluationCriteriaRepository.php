<?php

namespace App\Repositories\EvaluationCriteria;

use LaravelEasyRepository\Repository;

interface EvaluationCriteriaRepository extends Repository{

    // Write something awesome :
    public function getLatestEvalCriteria();

    public function allEvalCriteria();
}
