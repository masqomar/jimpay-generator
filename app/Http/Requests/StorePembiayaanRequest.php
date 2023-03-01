<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembiayaanRequest extends FormRequest
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
            'duration' => 'required|numeric',
            'note' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'product_specification' => 'nullable|string|max:255',
            'extra_field' => 'required|string',
        ];
    }
}
