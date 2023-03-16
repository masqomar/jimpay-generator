<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWithdrawRequestRequest extends FormRequest
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
            'amount' => 'required|numeric',
			'user_id' => 'required|exists:App\Models\User,id',
			'bank_id' => 'nullable|numeric',
			'bank_account_number' => 'nullable|numeric',
			'bank_account_name' => 'nullable|string',
			'image' => 'nullable|image|max:2048',
			'extra_field' => 'nullable|string',
        ];
    }
}
