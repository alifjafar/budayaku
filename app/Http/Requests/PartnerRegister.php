<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRegister extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'slug' => 'required|unique:partners',
            'name' => 'required|max:20',
            'description' => 'required',
            'address' => 'required',
            'id_card' => 'required|image|mimes:jpeg,png,svg,jpg'
        ];
    }
}
