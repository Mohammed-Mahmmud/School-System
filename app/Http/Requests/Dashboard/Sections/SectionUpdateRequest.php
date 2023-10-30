<?php

namespace App\Http\Requests\Dashboard\Sections;

use Illuminate\Foundation\Http\FormRequest;

class SectionUpdateRequest extends FormRequest
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
            'en_section'=>['required','string'],
            'ar_section'=>['required','string'],
            'icon'=>['nullable'],
            'sub_of'=>['nullable'],
            'link'=>['nullable'],
            'order'=>['required'],
            'trash'=>['required'],
            'type'=>['required'],

        ];
    }
}
