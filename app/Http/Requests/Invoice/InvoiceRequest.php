<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
        'user_id' => [
            'required',
            'string',
            'exists:users,id',
        ],
        'reciver_id' => [
            'required',
            'string',
            'exists:users,id',
        ],

        'description' => [
            'required',
            'string',
            'max:500',
        ],

        'status' => [
            'sometimes',
            'in:paid,unpaid',
        ],
        'invoice_type' => [
            'required',
            'in:quotation,invoice,goods_delivery,receipt,statement',
        ],

        'e_wallet_number' => [
            'nullable',
            'string',
            'max:50',
        ],

        'bank_account_holder_name' => [
            'required',
            'string',
            'max:255',
        ],

        'bank_name' => [
            'required',
            'string',
            'max:255',
        ],

        'bank_account_number' => [
            'required',
            'string',
            'max:50',
        ],

        'bank_branch_number' => [
            'required',
            'string',
            'max:50',
        ],

        'bank_swift_code' => [
            'required',
            'string',
            'max:50',
        ],

        'data' => [
            'required',
            'array',
        ],
    ];
    }
}
