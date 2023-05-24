<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|255",
            "address" => "required|max:500",
            "country" => "required|not_regex:/Select a country/",
            "city" => "required",
            "phone" => "required|max:20",
            "email" => "required",
            "stars" => "required|min:1|max:5",
        ];

    }

        public function messages()
        {
            return [
                "country.not_regex" => "The country field is required."
            ];
        }
}
