@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.patient.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.patients.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.patient.fields.patient_gender') }}</label>
                <select class="form-control {{ $errors->has('patient_gender') ? 'is-invalid' : '' }}" name="patient_gender" id="patient_gender" required>
                    <option value disabled {{ old('patient_gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Patient::PATIENT_GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('patient_gender', 'women') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient_gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="patient_fname">{{ trans('cruds.patient.fields.patient_fname') }}</label>
                <input class="form-control {{ $errors->has('patient_fname') ? 'is-invalid' : '' }}" type="text" name="patient_fname" id="patient_fname" value="{{ old('patient_fname', '') }}">
                @if($errors->has('patient_fname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_fname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_fname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="patient_lname">{{ trans('cruds.patient.fields.patient_lname') }}</label>
                <input class="form-control {{ $errors->has('patient_lname') ? 'is-invalid' : '' }}" type="text" name="patient_lname" id="patient_lname" value="{{ old('patient_lname', '') }}">
                @if($errors->has('patient_lname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_lname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_lname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="patient_cin">{{ trans('cruds.patient.fields.patient_cin') }}</label>
                <input class="form-control {{ $errors->has('patient_cin') ? 'is-invalid' : '' }}" type="text" name="patient_cin" id="patient_cin" value="{{ old('patient_cin', '') }}">
                @if($errors->has('patient_cin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_cin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_cin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="patient_birthday">{{ trans('cruds.patient.fields.patient_birthday') }}</label>
                <input class="form-control date {{ $errors->has('patient_birthday') ? 'is-invalid' : '' }}" type="text" name="patient_birthday" id="patient_birthday" value="{{ old('patient_birthday') }}">
                @if($errors->has('patient_birthday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_birthday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_birthday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="patient_mobile">{{ trans('cruds.patient.fields.patient_mobile') }}</label>
                <input class="form-control {{ $errors->has('patient_mobile') ? 'is-invalid' : '' }}" type="text" name="patient_mobile" id="patient_mobile" value="{{ old('patient_mobile', '') }}">
                @if($errors->has('patient_mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="patient_email">{{ trans('cruds.patient.fields.patient_email') }}</label>
                <input class="form-control {{ $errors->has('patient_email') ? 'is-invalid' : '' }}" type="text" name="patient_email" id="patient_email" value="{{ old('patient_email', '') }}">
                @if($errors->has('patient_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.patient.fields.patient_type') }}</label>
                <select class="form-control {{ $errors->has('patient_type') ? 'is-invalid' : '' }}" name="patient_type" id="patient_type">
                    <option value disabled {{ old('patient_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Patient::PATIENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('patient_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.patient.fields.patient_insurance') }}</label>
                <select class="form-control {{ $errors->has('patient_insurance') ? 'is-invalid' : '' }}" name="patient_insurance" id="patient_insurance">
                    <option value disabled {{ old('patient_insurance', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Patient::PATIENT_INSURANCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('patient_insurance', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient_insurance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_insurance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_insurance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="patient_profession">{{ trans('cruds.patient.fields.patient_profession') }}</label>
                <input class="form-control {{ $errors->has('patient_profession') ? 'is-invalid' : '' }}" type="text" name="patient_profession" id="patient_profession" value="{{ old('patient_profession', '') }}">
                @if($errors->has('patient_profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="patient_note">{{ trans('cruds.patient.fields.patient_note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('patient_note') ? 'is-invalid' : '' }}" name="patient_note" id="patient_note">{!! old('patient_note') !!}</textarea>
                @if($errors->has('patient_note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.patient_note_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.patients.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $patient->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection