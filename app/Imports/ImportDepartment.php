<?php

namespace App\Imports;

use App\Models\Department;
use App\Services\Department\DepartmentService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportDepartment implements ToModel, WithHeadingRow, WithValidation
{
    protected DepartmentService $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    /**
    * @param ToModel $ToModel
    */
    public function model(array $row)
    {
        return new Department([
            'title' => $row['title'],
            'description' => $row['description'],
            'department_code' => $this->departmentService->generateDepartmentCode()
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|unique:departments',
            '*.title' => 'required|unique:departments'
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'title.required' => 'The :attribute field is required.',
            'title.unique' => 'The :attribute has already been taken.',
        ];
    }
    
    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return ['title' => 'title'];
    }
}
