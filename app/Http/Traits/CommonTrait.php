<?php
namespace App\Http\Traits;
use App\Models\CategoryCriteria;
use App\Models\Department;
use App\Models\JobTitle;
use App\Models\User;
use Illuminate\Http\Response;

trait CommonTrait {
    public function listDepartments() {
        return Department::latest()->where('status','1')->whereNull('deleted_at')->pluck('title','id');
    }

    public function listJobTitles() {
        return JobTitle::latest()->where('status','1')->whereNull('deleted_at')->pluck('title','id');
    }

    public function listUsers() {
        return User::latest()->where('status','1')->whereNull('deleted_at')->pluck('name','id');
    }

    public function listCateCriteria() {
        return CategoryCriteria::latest()->where('status','1')->whereNull('deleted_at')->pluck('title','id');
    }

    public function findOrFailAndReturn($model, $id) {
        $result = $model::findOrFail($id);
        if(!$result || $result->deleted_at !== null){
            abort(Response::HTTP_NOT_FOUND);
        }
        return $result;
    }
}
