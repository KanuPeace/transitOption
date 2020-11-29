<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerminalRequest extends FormRequest
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
            "name" => "required|string",
            "email" => "nullable|email",
            "phones" => "required|string",
            "address" => "required|string",
            "country_id" => "required|string",
            "state_id" => "required|string",
            "city_id" => "nullable|string",
            "lga_id" => "nullable|string",
        ];
    }
}
