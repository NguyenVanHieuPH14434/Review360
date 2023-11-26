<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
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
            'email' => ['required', 'email', $uniqueEmail, 'max:255'],
            'role_id' => ['required'],
            'job_title_id' => ['required'],
            'department_id' => ['required'],
            'direct_management' => ['required'],
            'work_start_date' => ['required', 'date_format:d/m/Y'],
            'avatar' => ['mimes:png,jpg,jpeg', 'max:5120'],
            'level' => ['required']
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
            'email.max' => ':attribute tối đa :max ký tự!',
            'role_id.required' => ':attribute không được trống!',
            'job_title_id.required' => ':attribute không được trống!',
            'department_id.required' => ':attribute không được trống!',
            'direct_management.required' => ':attribute không được trống!',
            'work_start_date.required' => ':attribute không được trống!',
            'work_start_date.date_format' => ':attribute phải là dạng :format!',
            'avatar.mimes' => ':attribute phải là dạng :values!',
            'avatar.max' => ':attribute tối đa 5Mb!',
            'level.required' => ':attribute không được trống!'
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
            'avatar' => "Ảnh",
            'level' => 'Level'
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            if($validator->failed()) {
                if($this->hasFile('avatar')){
                    session()->flash('originName', $this->file('avatar')->hashName());
                    return redirect()->back()->withInput()->withErrors($validator)
                    ->with('image', fileUpload($this->file('avatar'), 'user', 'uploads/tmp-users'));
                }
            }
        });
    }
}
