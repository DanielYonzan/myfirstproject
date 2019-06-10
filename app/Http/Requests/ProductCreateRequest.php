<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category'=>'required',
            'name'=>'required|min:5',

        ];
    }

    public function messages()
    {
        return [
            'category.required'=>'Select Category',
            'name.required'=>'Enter Name',
            'name.min'=>'Name must be atleasts 5 character',

        ];
    }
}
