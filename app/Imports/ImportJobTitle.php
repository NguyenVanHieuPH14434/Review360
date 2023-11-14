<?php

namespace App\Imports;

use App\Models\Jobtitle;
use App\Services\Jobtitle\JobTitleService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportJobTitle implements ToModel, WithHeadingRow, WithValidation
{
    protected JobTitleService $jobTitleService;

    public function __construct(JobtitleService $jobTitleService)
    {
        $this->jobTitleService = $jobTitleService;
    }
    /**
    * @param ToModel $ToModel
    */
    public function model(array $row)
    {
        return new Jobtitle([
            'title' => $row['title'],
            'description' => $row['description'],
            'job_title_code' => $this->jobTitleService->generateJobTitleCode()
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|unique:job_title',
            '*.title' => 'required|unique:job_title'
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
