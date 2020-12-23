<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'ime' => 'required|max:255',
            'slug' => [
                'required',
                'max:255',
                Rule::unique('products')->ignore($this->id),
            ],
            'category_id' => 'required|max:255',
            'subcategory_id' => 'required|max:255',
            'proizvodjac' => 'required|max:255',
            'pakovanje' => 'required|max:255',
            'dostupnost' => 'required|max:255',
            'cena' => 'required|max:255',
            'popust' => 'min:0|max:99',
            'opis' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5200',
        ];
    }
}
