@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.services.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="service_name">{{ trans('cruds.service.fields.service_name') }}</label>
                <input class="form-control {{ $errors->has('service_name') ? 'is-invalid' : '' }}" type="text" name="service_name" id="service_name" value="{{ old('service_name', '') }}" required>
                @if($errors->has('service_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.service_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="service_reference">{{ trans('cruds.service.fields.service_reference') }}</label>
                <input class="form-control {{ $errors->has('service_reference') ? 'is-invalid' : '' }}" type="text" name="service_reference" id="service_reference" value="{{ old('service_reference', '') }}">
                @if($errors->has('service_reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.service_reference_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('service_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="service_active" value="0">
                    <input class="form-check-input" type="checkbox" name="service_active" id="service_active" value="1" {{ old('service_active', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="service_active">{{ trans('cruds.service.fields.service_active') }}</label>
                </div>
                @if($errors->has('service_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.service_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="service_price">{{ trans('cruds.service.fields.service_price') }}</label>
                <input class="form-control {{ $errors->has('service_price') ? 'is-invalid' : '' }}" type="number" name="service_price" id="service_price" value="{{ old('service_price', '') }}" step="0.01" required>
                @if($errors->has('service_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.service_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="service_min_price">{{ trans('cruds.service.fields.service_min_price') }}</label>
                <input class="form-control {{ $errors->has('service_min_price') ? 'is-invalid' : '' }}" type="number" name="service_min_price" id="service_min_price" value="{{ old('service_min_price', '') }}" step="0.01">
                @if($errors->has('service_min_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_min_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.service_min_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="service_max_price">{{ trans('cruds.service.fields.service_max_price') }}</label>
                <input class="form-control {{ $errors->has('service_max_price') ? 'is-invalid' : '' }}" type="text" name="service_max_price" id="service_max_price" value="{{ old('service_max_price', '') }}">
                @if($errors->has('service_max_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_max_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.service_max_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_id">{{ trans('cruds.service.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.category_helper') }}</span>
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