<?php

namespace App\Http\Requests\Dashboard\Classroom;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomStoreRequest extends FormRequest
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
        'en_classroom'=>['required','string'],
        'ar_classroom'=>['required','string'],
        'grade'=>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'en_classroom.reuired' => trans('Dashboard/validation.required'),
            'ar_classroom.required' => trans('Dashboard/validation.required'),
            'grade.required' => trans('Dashboard/validation.required'),
        ];
    }
}
