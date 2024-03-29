<?php

namespace App\Repositories\AssessmentPeriod;

use LaravelEasyRepository\Repository;

interface AssessmentPeriodRepository extends Repository{

    public function allAssessmentPeriod();

    public function listAP();

    public function getListUser($data);

    public function getListEmpReview($asID);

    public function getEmpReview($id, $asID);
}
