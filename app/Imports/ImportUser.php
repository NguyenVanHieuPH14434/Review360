<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\JobTitle;
use App\Models\User;
use App\Services\Department\DepartmentService;
use App\Services\Jobtitle\JobTitleService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class ImportUser implements ToModel, WithHeadingRow, WithValidation, WithChunkReading, SkipsOnError
{
    use Importable, SkipsErrors;
    private UserService $userService;
    private $roles;
    private $rows = 0;
    private $errorRows = [];
    private $currentRow = 1;
    private $message = null;

    public function __construct(
        UserService $userService,
        $roles
    )
    {
        $this->userService = $userService;
        $this->roles = $roles;
    }
    /**
    * @param ToModel $ToModel
    */
    public function model(array $row)
    {
        try {
            $this->currentRow++;
            $roleId = ! is_integer($row['role']) ? array_search($row['role'], $this->roles) : $row['role'];
            $jobTitleId = JobTitle::where("title", $row['job_title'])->select('id')->first();
            if(! $jobTitleId) {
                $this->message = "The data in the job title column does not exist!";
            }
            $departmentId = Department::where("title", $row['department'])->select('id')->first();
            if(! $departmentId) {
                $this->message = is_null($this->message) ? "The data in the department column does not exist!" : $this->message;
            }
            $directManagement = User::where("code", $row['manage'])->select('id')->first();
            if(! $directManagement) {
                $this->message = is_null($this->message) ? "The data in the manage column does not exist!" : $this->message;
            }

            return new User([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => isset($row['password']) ? Hash::make($row['password']) : Hash::make('password'),
                'role_id' => $roleId, 
                'job_title_id' => $jobTitleId->id,
                'department_id'=> $departmentId->id, 
                'code' => $this->userService->generateUserCode(), 
                'direct_management' => $directManagement->id,
                'work_start_date' => $row['work_start'] ? date('Y-m-d', strtotime($row['work_start'])) : now(),
                'avatar' => defaultImage(),
                'status' => isset($row['status']) && $row['status'] == ("Hoạt động" || "Active") ? 1 : 2,
            ]);
        } catch (\Exception $e) {
            $this->onError($e);
            $this->errorRows[] = $this->currentRow;
        }
    }

    public function rules(): array
    {
        return [
            '*.name' => 'required',
            '*.email' => 'required|unique:users',
            '*.role' => 'required',
            '*.job_title' => 'required',
            '*.department' => 'required',
            '*.manage' => 'required',
            '*.work_start' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            //
        ];
    }
    
    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            //
        ];
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function onError(Throwable $e)
    {
        return false;
    }

    public function getErrorRows()
    {
        return [
            'row' => $this->errorRows,
            'message' => $this->message
        ];
    }
}
