<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobTitleRequest extends FormRequest
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
        $uniqueTitle = Rule::unique('job_title', 'title');
        if($req->method() == 'PUT'){
            $uniqueTitle = Rule::unique('job_title', 'title')->ignore($req->id);
        }
        return [
            'title' => ["required", $uniqueTitle, 'max:255'],
            'status' => "required",
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>':attribute không được để trống!',
            'title.unique'=>':attribute đã tồn tại!',
            'title.max'=>':attribute tối đa :max ký tự!',
            'status.required'=>':attribute không được để trống!',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Chức danh',
            'status'=> 'Trạng thái',
        ];
    }
}
