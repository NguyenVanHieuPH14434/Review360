<?php

namespace App\Services\Department;

use LaravelEasyRepository\BaseService;

interface DepartmentService extends BaseService{

    public function listDepartment($searchData, $limit);

    public function findDepartment($id);

    public function createDepartment($data);

    public function generateDepartmentCode();

    public function updateDepartment($id, $data);
}
