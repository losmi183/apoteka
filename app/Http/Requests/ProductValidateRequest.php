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
            'ime' => 'required',
            'slug' => 'required|unique:products',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'proizvodjac' => 'required',
            'pakovanje' => 'required',
            'dostupnost' => 'required',
            'cena' => 'required',
            'opis' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5200',
        ];
    }

    public function messages()
    {
        return [
            'ime.required' => 'Naziv proizvoda je obavezan',
            'slug.required' => 'slug polje je obavezno',
            'slug.unique' => 'slug se već koristi. Odaberite drugi slug',
            'category_id.required' => 'Kategorija je obavezna',
            'subcategory_id.required' => 'Podategorija je obavezna',
            'proizvodjac.required' => 'Proizvodjač je obavezan',
            'pakovanje.required' => 'Naziv proizvoda je obavezan',
            'dostupnost.required' => 'Naziv proizvoda je obavezan',
            'cena.required' => 'Cena proizvoda je obavezna',
            'opis.required' => 'Opis proizvoda je obavezan',
            'image.image' => 'Odabrani fajl mora biti slika',
            'image.mimes' => 'Podržani tipovi: jpg, jpeg, png, svg, gif',
            'image.max' => 'Maksimalna veličina slike: 5 Mb'
        ];
    }
}
