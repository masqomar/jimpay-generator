<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCashflowTransactionRequest extends FormRequest
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
            'cashflow_id' => 'required|exists:App\Models\Cashflow,id',
			'bank_id' => 'required|exists:App\Models\Bank,id',
			'description' => 'nullable|string',
			'extra_field' => 'nullable|string',
        ];
    }
}
