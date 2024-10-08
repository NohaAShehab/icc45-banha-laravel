<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidNames;

class StoreManagerRequest extends FormRequest
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
        # define validation rules ?
        return [
            // # this
            'name'=>[
                'required',
                'min:3',
                new ValidNames(),

            ],
            'email'=>'required|unique:managers,email',
            'image'=>'mimes:jpeg,jpg,png,gif',
            'gender'=>'required',
            'salary'=>'required|numeric|min:1000',
        ];
    }

    # cutomize message
    function  messages(): array
    {
        return [
          'name.required'=>"no manager without name"
        ];
    }
}
