<?php

namespace App\Http\Requests;

use App\Models\SessionLine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSessionLineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('session_line_create');
    }

    public function rules()
    {
        return [
            'quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
