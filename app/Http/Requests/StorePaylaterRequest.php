<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaylaterRequest extends FormRequest
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
            'user_id' => 'required|exists:App\Models\User,id',
            'paylater_provider_id' => 'required|exists:App\Models\PaylaterProvider,id',
            'bank_id' => 'required|exists:App\Models\Bank,id',
            'bank_account_number' => 'nullable|numeric',
            'bank_account_name' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
            'status' => 'required|boolean',
            'amount' => 'required|numeric',
            'duration' => 'required|numeric',
            'note' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'product' => 'required|string|max:255',
            'product_specification' => 'required|string',
            'extra_field' => 'nullable|string',
        ];
    }
}
