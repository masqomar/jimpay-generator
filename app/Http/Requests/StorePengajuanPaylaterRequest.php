<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengajuanPaylaterRequest extends FormRequest
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
            'paylater_provider_id' => 'required|numeric',
            'bank_id' => 'required|numeric',
            'bank_account_number' => 'required|numeric',
            'bank_account_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'duration' => 'required|numeric',
            'note' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'product_specification' => 'nullable|string|max:255',
            'extra_field' => 'required|string',
        ];
    }
}
