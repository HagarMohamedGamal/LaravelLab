<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|unique:posts|min:3',
            'description' => 'required|min:10',
            'user_id' => 'exists:App\User,id',
            'image' => 'mimes:jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'title.min' => "you enterd less than 3 chars",
            'description.min' => "you enterd less than 10 chars"
        ];
    }

}
