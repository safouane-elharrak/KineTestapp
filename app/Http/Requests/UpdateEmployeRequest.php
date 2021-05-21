<?php

namespace App\Http\Requests;

use App\Models\Employe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employe_edit');
    }

    public function rules()
    {
        return [
            'employe_fname' => [
                'string',
                'required',
            ],
            'employe_lname' => [
                'string',
                'required',
            ],
            'employe_cin' => [
                'string',
                'min:5',
                'max:7',
                'required',
            ],
            'employe_cnss' => [
                'string',
                'nullable',
            ],
            'employe_birthday' => [
                'string',
                'max:0',
                'nullable',
            ],
            'employe_orgin' => [
                'string',
                'nullable',
            ],
            'employe_start' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'employe_end' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
