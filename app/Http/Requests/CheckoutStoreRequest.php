<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutStoreRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'adresa' => 'required|max:255',
            'telefon' => 'required|max:30',
            'grad' => 'required|max:255',
            'napomene' => 'max:1000',
        ];
    }
}
