<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_edit');
    }

    public function rules()
    {
        return [
            'payement_method' => [
                'required',
            ],
            'payment_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'payment_ref' => [
                'string',
                'nullable',
            ],
            'note' => [
                'string',
                'nullable',
            ],
            'payement_amount' => [
                'required',
            ],
        ];
    }
}
