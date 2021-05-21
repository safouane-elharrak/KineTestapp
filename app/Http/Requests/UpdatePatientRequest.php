<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePatientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('patient_edit');
    }

    public function rules()
    {
        return [
            'patient_gender' => [
                'required',
            ],
            'patient_fname' => [
                'string',
                'nullable',
            ],
            'patient_lname' => [
                'string',
                'nullable',
            ],
            'patient_cin' => [
                'string',
                'min:1',
                'max:7',
                'nullable',
            ],
            'patient_birthday' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'patient_mobile' => [
                'string',
                'nullable',
            ],
            'patient_email' => [
                'string',
                'nullable',
            ],
            'patient_profession' => [
                'string',
                'nullable',
            ],
        ];
    }
}
