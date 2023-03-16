<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWithdrawRequest extends FormRequest
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
            'amount' => 'required|numeric',
            'bank_id' => 'nullable|numeric',
            'bank_account_number' => 'nullable|numeric',
            'bank_account_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048'
        ];
    }
}
