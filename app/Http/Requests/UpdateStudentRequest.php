<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
            //

            'name'=>[
                'required',
                'min:3',

            ],
            'email'=>[
                'required',
                Rule::unique('students')->ignore($this->student),
            ],
            // 'image'=>'mimes:jpeg,jpg,png,gif',
            'gender'=>'required',
            'grade'=>'required|numeric',
        
        ];
    }
}
