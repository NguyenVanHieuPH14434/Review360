<?php

namespace App\Services\CategoryCriteria;

use LaravelEasyRepository\BaseService;

interface CategoryCriteriaService extends BaseService{

    public function listCategoryCriteria();

    public function findCategoryCriteria($id);

    public function createCategoryCriteria($data);

    public function updateCategoryCriteria($id, $data);

    public function deleteCategoryCriteria($id);
}
