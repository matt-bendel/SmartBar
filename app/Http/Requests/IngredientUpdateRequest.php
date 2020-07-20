<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class IngredientUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ingredients' => 'required|array',
            'ingredients.*.id'  => 'required|numeric|exists:ingredients',
            'ingredients.*.amount' => 'required|numeric',
            'ingredients.*.position' => 'required|numeric|min:0|max:5'
        ];
    }
}
