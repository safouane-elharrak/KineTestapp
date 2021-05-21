@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories.update", [$category->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="catergory_name">{{ trans('cruds.category.fields.catergory_name') }}</label>
                <input class="form-control {{ $errors->has('catergory_name') ? 'is-invalid' : '' }}" type="text" name="catergory_name" id="catergory_name" value="{{ old('catergory_name', $category->catergory_name) }}" required>
                @if($errors->has('catergory_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('catergory_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.catergory_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference">{{ trans('cruds.category.fields.reference') }}</label>
                <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', $category->reference) }}">
                @if($errors->has('reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.reference_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $category->active || old('active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.category.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.active_helper') }}</span>
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