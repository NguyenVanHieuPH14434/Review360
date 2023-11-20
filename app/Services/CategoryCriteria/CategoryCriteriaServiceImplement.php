<?php

namespace App\Services\CategoryCriteria;

use LaravelEasyRepository\Service;
use App\Repositories\CategoryCriteria\CategoryCriteriaRepository;

class CategoryCriteriaServiceImplement extends Service implements CategoryCriteriaService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(CategoryCriteriaRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function listCategoryCriteria(){
        return $this->mainRepository->allCategoryCriteria();
    }

    public function findCategoryCriteria($id)
    {
       return $this->mainRepository->find($id);
    }

    public function createCategoryCriteria($data)
    {
       return $this->mainRepository->create($data);
    }

    public function updateCategoryCriteria($id, $data)
    {
        return $this->mainRepository->update($id, $data);
    }

    public function deleteCategoryCriteria($id)
    {
       return $this->mainRepository->delete($id);
    }
}
