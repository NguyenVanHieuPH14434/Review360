<?php

namespace App\Services\Department;

use LaravelEasyRepository\Service;
use App\Repositories\Department\DepartmentRepository;

class DepartmentServiceImplement extends Service implements DepartmentService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
      $this->departmentRepository = $departmentRepository;
    }

    public function listDepartment($searchData, $limit) {
      return $this->departmentRepository->listDepartment($searchData, $limit);
  }

  public function findDepartment($id)
  {
    return $this->departmentRepository->find($id);
  }

  public function createDepartment($data)
  {
    $data['department_code'] = $this->generateDepartmentCode();
    return $this->departmentRepository->create($data);
  }

  public function generateDepartmentCode()
  {
      $result = $this->departmentRepository->getLatestDepartment();
      return generateCode("DT", $result);
  }

  public function updateDepartment($id, $data)
  {
    return $this->departmentRepository->update($id, $data);
  }

  public function getAllDepartment()
  {
    return $this->departmentRepository->all();
  }
}
