<?php

namespace App\Services\EvalForm;

use LaravelEasyRepository\Service;
use App\Repositories\EvalForm\EvalFormRepository;

class EvalFormServiceImplement extends Service implements EvalFormService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(EvalFormRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
