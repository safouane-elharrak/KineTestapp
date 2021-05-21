@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.session.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sessions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="session_date">{{ trans('cruds.session.fields.session_date') }}</label>
                <input class="form-control date {{ $errors->has('session_date') ? 'is-invalid' : '' }}" type="text" name="session_date" id="session_date" value="{{ old('session_date') }}">
                @if($errors->has('session_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('session_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.session.fields.session_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="patient_id">{{ trans('cruds.session.fields.patient') }}</label>
                <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id">
                    @foreach($patients as $id => $entry)
                        <option value="{{ $id }}" {{ old('patient_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.session.fields.patient_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.session.fields.session_type') }}</label>
                <select class="form-control {{ $errors->has('session_type') ? 'is-invalid' : '' }}" name="session_type" id="session_type">
                    <option value disabled {{ old('session_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Session::SESSION_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('session_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('session_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('session_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.session.fields.session_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="session_location">{{ trans('cruds.session.fields.session_location') }}</label>
                <input class="form-control {{ $errors->has('session_location') ? 'is-invalid' : '' }}" type="text" name="session_location" id="session_location" value="{{ old('session_location', '') }}">
                @if($errors->has('session_location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('session_location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.session.fields.session_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.session.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.session.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employe_id">{{ trans('cruds.session.fields.employe') }}</label>
                <select class="form-control select2 {{ $errors->has('employe') ? 'is-invalid' : '' }}" name="employe_id" id="employe_id">
                    @foreach($employes as $id => $entry)
                        <option value="{{ $id }}" {{ old('employe_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('employe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.session.fields.employe_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="session_total">{{ trans('cruds.session.fields.session_total') }}</label>
                <input class="form-control {{ $errors->has('session_total') ? 'is-invalid' : '' }}" type="number" name="session_total" id="session_total" value="{{ old('session_total', '') }}" step="0.01">
                @if($errors->has('session_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('session_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.session.fields.session_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.session.fields.session_status') }}</label>
                <select class="form-control {{ $errors->has('session_status') ? 'is-invalid' : '' }}" name="session_status" id="session_status">
                    <option value disabled {{ old('session_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Session::SESSION_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('session_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('session_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('session_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.session.fields.session_status_helper') }}</span>
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