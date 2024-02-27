<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:550',
            'long_description' => 'required|string',
            'iamge' =>'required|mimes:jpeg,png,jpg|max:2048',
            'slug' => 'required|string|unique:blogs,slug',
        ];
    }
}
