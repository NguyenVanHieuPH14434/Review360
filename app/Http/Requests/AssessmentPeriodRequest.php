<?php

namespace App\Http\Requests;

use App\Models\AssessmentPeriod;
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
    public function rules(): array
    {
        return [
            'title' => "required",
            'status' => "required",
            'start_date' => "required",
            'end_date' => "required",
            'type_eval' => "required",
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>':attribute không được để trống!',
            'status.required'=>':attribute không được để trống!',
            'start_date.required'=>':attribute không được để trống!',
            'end_date.required'=>':attribute không được để trống!',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Kỳ đánh giá',
            'status'=> 'Trạng thái',
            'start_date'=> 'Thời hạn đánh giá',
            'end_date'=> 'Thời hạn đánh giá',
            'type_eval' => 'Loại đánh giá'
        ];
    }
}
