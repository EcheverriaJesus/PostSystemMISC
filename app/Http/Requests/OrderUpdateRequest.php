<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string', 'max:50'],
            'direction' => ['required', 'string', 'max:100'],
            'number_phone' => ['required', 'string', 'max:10'],
            'delivery_date' => ['required', 'date'],
            'leave' => ['required', 'numeric'],
            'subtract' => ['required', 'numeric'],
            'description' => ['required', 'string', 'max:100'],
            'total' => ['required', 'numeric'],
        ];
    }
}
