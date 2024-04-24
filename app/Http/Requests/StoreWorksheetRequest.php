<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorksheetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "owner_first_name" => "required|string",
            "owner_last_name"=> "required|string",
            "owner_phone"=> "required|string",
            "owner_country" => "required|string",
            "owner_state" => "required|string",
            "owner_city" => "required|string",
            "owner_zip" => "required|string",
            "owner_street" => "required|string",
            "owner_steetnr" => "required|integer",
            "make" => "required|string",
            "model" => "required|string",
            "license_plate" => "required|string",
            "manufacturing_year" => "required|string",
            'mechanic' => "required"
        ];
    }
}
