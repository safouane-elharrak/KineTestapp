@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.patient.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.id') }}
                        </th>
                        <td>
                            {{ $patient->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_gender') }}
                        </th>
                        <td>
                            {{ App\Models\Patient::PATIENT_GENDER_SELECT[$patient->patient_gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_fname') }}
                        </th>
                        <td>
                            {{ $patient->patient_fname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_lname') }}
                        </th>
                        <td>
                            {{ $patient->patient_lname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_cin') }}
                        </th>
                        <td>
                            {{ $patient->patient_cin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_birthday') }}
                        </th>
                        <td>
                            {{ $patient->patient_birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_mobile') }}
                        </th>
                        <td>
                            {{ $patient->patient_mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_email') }}
                        </th>
                        <td>
                            {{ $patient->patient_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_type') }}
                        </th>
                        <td>
                            {{ App\Models\Patient::PATIENT_TYPE_SELECT[$patient->patient_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_insurance') }}
                        </th>
                        <td>
                            {{ App\Models\Patient::PATIENT_INSURANCE_SELECT[$patient->patient_insurance] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_profession') }}
                        </th>
                        <td>
                            {{ $patient->patient_profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patient.fields.patient_note') }}
                        </th>
                        <td>
                            {!! $patient->patient_note !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#patient_appointments" role="tab" data-toggle="tab">
                {{ trans('cruds.appointment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="patient_appointments">
            @includeIf('admin.patients.relationships.patientAppointments', ['appointments' => $patient->patientAppointments])
        </div>
    </div>
</div>

@endsection