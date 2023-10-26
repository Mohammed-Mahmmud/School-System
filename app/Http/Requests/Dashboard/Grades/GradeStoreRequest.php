<?php

namespace App\Http\Requests\Dashboard\Grades;

use Illuminate\Foundation\Http\FormRequest;

class GradeStoreRequest extends FormRequest
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
            'en_grade'=>['required','string'],
            'ar_grade'=>['required','string'],
            'note'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'en_grade.reuired' => trans('Dashboard/validation.required'),
            'ar_grade.required' => trans('Dashboard/validation.required'),
            'note.required' => trans('Dashboard/validation.required'),
        ];
    }
}
