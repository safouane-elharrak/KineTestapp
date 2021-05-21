@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.appointments.update", [$appointment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="patient_id">{{ trans('cruds.appointment.fields.patient') }}</label>
                <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                    @foreach($patients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('patient_id') ? old('patient_id') : $appointment->patient->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.patient_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="appointment_date">{{ trans('cruds.appointment.fields.appointment_date') }}</label>
                <input class="form-control date {{ $errors->has('appointment_date') ? 'is-invalid' : '' }}" type="text" name="appointment_date" id="appointment_date" value="{{ old('appointment_date', $appointment->appointment_date) }}" required>
                @if($errors->has('appointment_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('appointment_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.appointment_date_helper') }}</span>
            </div>
<!---->            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
<label for="start_time">{{ trans('cruds.appointment.fields.start_time') }}*</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($appointment) ? $appointment->start_time : '') }}" required>
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.appointment.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('finish_time') ? 'has-error' : '' }}">
                <label for="finish_time">{{ trans('cruds.appointment.fields.finish_time') }}*</label>
                <input type="text" id="finish_time" name="finish_time" class="form-control datetime" value="{{ old('finish_time', isset($appointment) ? $appointment->finish_time : '') }}" required>
                @if($errors->has('finish_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('finish_time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.appointment.fields.finish_time_helper') }}
                </p>
            </div> <!---->

            <div class="form-group">
                <label>{{ trans('cruds.appointment.fields.appointment_type') }}</label>
                <select class="form-control {{ $errors->has('appointment_type') ? 'is-invalid' : '' }}" name="appointment_type" id="appointment_type">
                    <option value disabled {{ old('appointment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Appointment::APPOINTMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('appointment_type', $appointment->appointment_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('appointment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('appointment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.appointment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.appointment.fields.appointment_status') }}</label>
                <select class="form-control {{ $errors->has('appointment_status') ? 'is-invalid' : '' }}" name="appointment_status" id="appointment_status">
                    <option value disabled {{ old('appointment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Appointment::APPOINTMENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('appointment_status', $appointment->appointment_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('appointment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('appointment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.appointment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="appointment_note">{{ trans('cruds.appointment.fields.appointment_note') }}</label>
                <input class="form-control {{ $errors->has('appointment_note') ? 'is-invalid' : '' }}" type="text" name="appointment_note" id="appointment_note" value="{{ old('appointment_note', $appointment->appointment_note) }}">
                @if($errors->has('appointment_note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('appointment_note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.appointment_note_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection