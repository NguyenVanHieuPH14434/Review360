<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AssessmentPeriodRequest extends FormRequest
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
        $uniqueTitle = Rule::unique('category_criteria', 'title')->whereNull('deleted_at');

        if ($req->method() == 'PUT') {
            $uniqueTitle->ignore($req->id);
        }

        return [
            'title' => ["required", $uniqueTitle],
            'status' => "required",
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>':attribute không được để trống!',
            'status.required'=>':attribute không được để trống!',
            'title.unique'=>':attribute đã tồn tại!',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Nhóm tiêu chí',
            'status'=> 'Trạng thái',
        ];
    }
}
