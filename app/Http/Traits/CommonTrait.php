<?php
namespace App\Http\Traits;
use App\Models\Department;
use App\Models\JobTitle;
trait CommonTrait {
    public function listDepartments() {
        return Department::latest()->where('status','1')->whereNull('deleted_at')->pluck('title','id');
    }

    public function listJobTitles() {
        return JobTitle::latest()->where('status','1')->whereNull('deleted_at')->pluck('title','id');
    }
}
