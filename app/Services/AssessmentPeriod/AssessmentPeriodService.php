<?php

namespace App\Services\AssessmentPeriod;

use LaravelEasyRepository\BaseService;

interface AssessmentPeriodService extends BaseService{

    public function listAssessmentPeriod();

    public function findAssessmentPeriod($id);

    public function createAssessmentPeriod($data);

    public function updateStep2($id, $data);

    public function getListUser($data);

    public function deleteAssessmentPeriod($id);

    public function listApCopy();

    public function listAp();

    public function listEmpReview($asID);

    public function getEmpReview($id, $asID);

}
