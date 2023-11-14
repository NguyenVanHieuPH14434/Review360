<?php

namespace App\Repositories\Department;

use LaravelEasyRepository\Repository;

interface DepartmentRepository extends Repository{

    public function listDepartment($searchData, $limit);

    public function getLatestDepartment();
}
