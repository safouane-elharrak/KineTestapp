@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employe.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.id') }}
                        </th>
                        <td>
                            {{ $employe->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_fname') }}
                        </th>
                        <td>
                            {{ $employe->employe_fname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_lname') }}
                        </th>
                        <td>
                            {{ $employe->employe_lname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_cin') }}
                        </th>
                        <td>
                            {{ $employe->employe_cin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.cin_file') }}
                        </th>
                        <td>
                            @foreach($employe->cin_file as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_cnss') }}
                        </th>
                        <td>
                            {{ $employe->employe_cnss }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_birthday') }}
                        </th>
                        <td>
                            {{ $employe->employe_birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_orgin') }}
                        </th>
                        <td>
                            {{ $employe->employe_orgin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_salary') }}
                        </th>
                        <td>
                            {{ $employe->employe_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_contract') }}
                        </th>
                        <td>
                            {{ App\Models\Employe::EMPLOYE_CONTRACT_SELECT[$employe->employe_contract] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_start') }}
                        </th>
                        <td>
                            {{ $employe->employe_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.employe_end') }}
                        </th>
                        <td>
                            {{ $employe->employe_end }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection