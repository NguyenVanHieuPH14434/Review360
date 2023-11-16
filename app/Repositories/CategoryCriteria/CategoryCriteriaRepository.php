<?php

namespace App\Repositories\CategoryCriteria;

use LaravelEasyRepository\Repository;

interface CategoryCriteriaRepository extends Repository{

    public function allCategoryCriteria();
}
