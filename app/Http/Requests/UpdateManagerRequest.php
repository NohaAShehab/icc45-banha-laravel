<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateManagerRequest extends FormRequest
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
            'name'=>'required|min:3',
            'email'=> Rule::unique('managers')->ignore($this->manager),
            'image'=>'mimes:jpeg,jpg,png,gif',
            'gender'=>'required',
            'salary'=>'required|numeric|min:1000',
        ];
    }
}
