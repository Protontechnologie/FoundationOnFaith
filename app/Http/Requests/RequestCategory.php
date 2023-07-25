<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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

    public function messages()
    {
        return [
        'name.required' => 'Name is required',  
        'slug.unique' => 'Slug must be unique', 
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:attributes,name',
            'slug' => 'required|unique:category,slug',
        ];
    }
}
