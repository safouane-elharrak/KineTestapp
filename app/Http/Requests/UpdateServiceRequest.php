<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_edit');
    }

    public function rules()
    {
        return [
            'service_name' => [
                'string',
                'required',
            ],
            'service_reference' => [
                'string',
                'nullable',
            ],
            'service_price' => [
                'required',
            ],
            'service_max_price' => [
                'string',
                'nullable',
            ],
        ];
    }
}
