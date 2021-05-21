<?php

namespace App\Http\Requests;

use App\Models\Session;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSessionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('session_create');
    }

    public function rules()
    {
        return [
            'session_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'session_location' => [
                'string',
                'nullable',
            ],
        ];
    }
}
