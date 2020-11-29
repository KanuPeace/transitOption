<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            "type" => "required|string",
            "color" => "required|string",
            // "vehicle_seat_style_id" => "required|string",
            "price" => "required|string",
            "terminal_id" => "required|string",
            "route_from" => "required|string",
            "route_to" => "required|string",
            "plate_no" => "required|string",
            "driver_name" => "required|string",
            "driver_phones" => "required|string",
            "description" => "nullable|string",
            "condition" => "required|string",
            "status" => "required|string",
            "is_transload" => "nullable|string|in:0,1",
            "has_ac" => "nullable|string|in:0,1",
            "is_priority" => "nullable|string|in:0,1",
            "is_featured" => "nullable|string|in:0,1",
        ];
    }
}
