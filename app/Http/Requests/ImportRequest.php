<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'file' => ["required", "mimes:xlsx,csv", "max:10240"]
        ];
    }

    public function messages()
    {
        return [
            'file.required' => ':attribute không được để trống!',
            'file.mimes' => ':attribute phải thuộc loại: xlsx, csv!',
            'file.max' => ':attribute không được lớn hơn 10Mb!',
        ];
    }

    public function attributes()
    {
        return [
            'file' => 'File'
        ];
    }
}
