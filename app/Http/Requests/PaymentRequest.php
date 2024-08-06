<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            "first_name" => "required|string",
            "last_name" => "required|string",
            "company_name" => "required|string",
            "country" => "required|string",
            "address_one" => "required|string",
            "address_two" => "string",
            "city" => "required|string",
            "state" => "required|string",
            "postalcode" => "required|string",
            "phone" => "required",
            "email" => "required|email",
            "note" => "string|nullable",
            "discount_code" => "string|nullable",
            "shipping" => "required",
            "payment_method" => "required|string",
        ];
    }
}
