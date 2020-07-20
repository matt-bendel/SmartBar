<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|max:255',
            'email'         => 'required|unique:users|email|max:255',
            'date_of_birth' => 'required|date|date_format:Y-m-d',
            'password'      => 'required|confirmed|min:8|max:255',
        ];
    }
}
