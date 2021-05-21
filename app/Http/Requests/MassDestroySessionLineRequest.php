<?php

namespace App\Http\Requests;

use App\Models\SessionLine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySessionLineRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('session_line_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:session_lines,id',
        ];
    }
}
