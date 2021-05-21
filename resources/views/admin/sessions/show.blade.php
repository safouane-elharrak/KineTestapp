@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.session.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sessions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.session.fields.id') }}
                        </th>
                        <td>
                            {{ $session->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.session.fields.session_date') }}
                        </th>
                        <td>
                            {{ $session->session_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.session.fields.patient') }}
                        </th>
                        <td>
                            {{ $session->patient->patient_gender ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.session.fields.session_type') }}
                        </th>
                        <td>
                            {{ App\Models\Session::SESSION_TYPE_SELECT[$session->session_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.session.fields.session_location') }}
                        </th>
                        <td>
                            {{ $session->session_location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.session.fields.user') }}
                        </th>
                        <td>
                            {{ $session->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.session.fields.employe') }}
                        </th>
                        <td>
                            {{ $session->employe->employe_fname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.session.fields.session_total') }}
                        </th>
                        <td>
                            {{ $session->session_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.session.fields.session_status') }}
                        </th>
                        <td>
                            {{ App\Models\Session::SESSION_STATUS_SELECT[$session->session_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sessions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection