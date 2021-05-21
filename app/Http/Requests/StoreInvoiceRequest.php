<?php

namespace App\Http\Requests;

use App\Models\Invoices;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_create');
    }

    public function rules()
    {
        return [
            'invoice_client_name' => [
                'string',
                'required',
            ],
            'invoice_cin' => [
                'string',
                'nullable',
            ],
            'invoice_ice' => [
                'string',
                'nullable',
            ],
            'invoice_address' => [
                'string',
                'nullable',
            ],
            'invoice_tva' => [
                'string',
                'nullable',
            ],
            'invoice_discount' => [
                'string',
                'nullable',
            ],
            'invoice_discount_type' => [
                'string',
                'nullable',
            ],
            'invoice_status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
