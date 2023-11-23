<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;

class EvalCriteriaRequest extends FormRequest
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
        $uniqueTitle = Rule::unique('eval_criteria', 'title')->whereNull('deleted_at');

        if ($req->method() == 'PUT') {
            $uniqueTitle->ignore($req->id);
        }

        return [
            'cat_criteria' => "required",
            'title' => ["required", $uniqueTitle],
            'status' => "required",
            'criterion_level' => "required",
            'type_criteria' => "required",
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>':attribute không được để trống!',
            'status.required'=>':attribute không được để trống!',
            'title.unique'=>':attribute đã tồn tại!',
            'cat_criteria.required' => ':attribute không được để trống!',
            'type_criteria.required' => ':attribute không được để trống!',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu chí',
            'status'=> 'Trạng thái',
            'cat_criteria'=> 'Nhóm tiêu chí',
            'type_criteria'=> 'Loại tiêu chí',
        ];
    }
}
