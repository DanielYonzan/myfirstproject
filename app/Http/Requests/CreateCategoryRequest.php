<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name'=>'required|min:5',
            'slug'=>'required',
            'rank'=>'required|integer|min:1|max:80'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Enter Name',
            'slug.required'=>'Enter Slug',
            'rank.required'=>'Enter Rank',
            'rank.min'=>'Rank must not be less than 1',
            'rank.max'=>'Rank must not be greater than 80'
        ];
    }
}
