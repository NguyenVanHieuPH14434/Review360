<?php

namespace App\Services\EvalForm;

use LaravelEasyRepository\BaseService;

interface EvalFormService extends BaseService{

    public function createEvalForm($data);

    public function listEvalForm();

    public function updateEvalForm($id, $data);

}
