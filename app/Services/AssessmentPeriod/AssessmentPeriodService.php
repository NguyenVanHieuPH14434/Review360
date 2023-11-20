<?php

namespace App\Services\AssessmentPeriod;

use LaravelEasyRepository\BaseService;

interface AssessmentPeriodService extends BaseService{

    public function listAssessmentPeriod();

    public function findAssessmentPeriod($id);

    public function createAssessmentPeriod($data);

    public function updateAssessmentPeriod($id, $data);

    public function deleteAssessmentPeriod($id);

}
