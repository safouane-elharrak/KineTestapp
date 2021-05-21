@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sessionLine.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.session-lines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sessionLine.fields.id') }}
                        </th>
                        <td>
                            {{ $sessionLine->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sessionLine.fields.session') }}
                        </th>
                        <td>
                            {{ $sessionLine->session->session_date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sessionLine.fields.service') }}
                        </th>
                        <td>
                            {{ $sessionLine->service->service_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sessionLine.fields.detail') }}
                        </th>
                        <td>
                            {!! $sessionLine->detail !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sessionLine.fields.quantity') }}
                        </th>
                        <td>
                            {{ $sessionLine->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sessionLine.fields.price') }}
                        </th>
                        <td>
                            {{ $sessionLine->price }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.session-lines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection