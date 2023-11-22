<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $req): array
    {
        $uniqueEmail = Rule::unique('users', 'email');
        if($req->method() == 'PUT'){
            $uniqueEmail->ignore($req->id);
        }
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', $uniqueEmail],
            'role_id' => ['required'],
            'job_title_id' => ['required'],
            'department_id' => ['required'],
            'direct_management' => ['required'],
            'work_start_date' => ['required', 'date', 'date_format:d-m-Y'],
            'avatar' => ['mimes:png,jpg,jpeg', 'max:5120']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute không được trống!',
            'name.max' => ':attribute tối đa :max ký tự!',
            'email.required' => ':attribute không được trống!',
            'email.email' => ':attribute không đúng định dạng!',
            'email.unique' => ':attribute đã tồn tại!',
            'role_id.required' => ':attribute không được trống!',
            'job_title_id.required' => ':attribute không được trống!',
            'department_id.required' => ':attribute không được trống!',
            'direct_management.required' => ':attribute không được trống!',
            'work_start_date.required' => ':attribute không được trống!',
            'work_start_date.date' => ':attribute không đúng định dạng!',
            'work_start_date.date_format' => ':attribute phải là dạng :format!',
            'avatar.mimes' => ':attribute phải là dạng :values!',
            'avatar.max' => ':attribute tối đa 5Mb!',
        ]; 
    }

    public function attributes()
    {
        return [
            'name' => 'Họ và tên',
            'email' => 'Email',
            'role_id' => 'Role',
            'job_title_id' => 'Chức danh',
            'department_id' => 'Phòng ban',
            'direct_management' => 'Người quản lý',
            'work_start_date' => 'Ngày làm việc',
            'avatar' => "Ảnh"
        ];
    }
}