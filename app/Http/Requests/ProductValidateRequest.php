<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidateRequest extends FormRequest
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
            'slug' => 'required|unique:products|max:255',
            'category_id' => 'required|max:255',
            'subcategory_id' => 'required|max:255',
            'proizvodjac' => 'required|max:255',
            'pakovanje' => 'required|max:255',
            'dostupnost' => 'required|max:255',
            'cena' => 'required|max:255',
            'opis' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5200',
        ];
    }   
}
