@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.employe.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employes.update", [$employe->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="employe_fname">{{ trans('cruds.employe.fields.employe_fname') }}</label>
                <input class="form-control {{ $errors->has('employe_fname') ? 'is-invalid' : '' }}" type="text" name="employe_fname" id="employe_fname" value="{{ old('employe_fname', $employe->employe_fname) }}" required>
                @if($errors->has('employe_fname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_fname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_fname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="employe_lname">{{ trans('cruds.employe.fields.employe_lname') }}</label>
                <input class="form-control {{ $errors->has('employe_lname') ? 'is-invalid' : '' }}" type="text" name="employe_lname" id="employe_lname" value="{{ old('employe_lname', $employe->employe_lname) }}" required>
                @if($errors->has('employe_lname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_lname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_lname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="employe_cin">{{ trans('cruds.employe.fields.employe_cin') }}</label>
                <input class="form-control {{ $errors->has('employe_cin') ? 'is-invalid' : '' }}" type="text" name="employe_cin" id="employe_cin" value="{{ old('employe_cin', $employe->employe_cin) }}" required>
                @if($errors->has('employe_cin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_cin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_cin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cin_file">{{ trans('cruds.employe.fields.cin_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cin_file') ? 'is-invalid' : '' }}" id="cin_file-dropzone">
                </div>
                @if($errors->has('cin_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cin_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.cin_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employe_cnss">{{ trans('cruds.employe.fields.employe_cnss') }}</label>
                <input class="form-control {{ $errors->has('employe_cnss') ? 'is-invalid' : '' }}" type="text" name="employe_cnss" id="employe_cnss" value="{{ old('employe_cnss', $employe->employe_cnss) }}">
                @if($errors->has('employe_cnss'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_cnss') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_cnss_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employe_birthday">{{ trans('cruds.employe.fields.employe_birthday') }}</label>
                <input class="form-control {{ $errors->has('employe_birthday') ? 'is-invalid' : '' }}" type="text" name="employe_birthday" id="employe_birthday" value="{{ old('employe_birthday', $employe->employe_birthday) }}">
                @if($errors->has('employe_birthday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_birthday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_birthday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employe_orgin">{{ trans('cruds.employe.fields.employe_orgin') }}</label>
                <input class="form-control {{ $errors->has('employe_orgin') ? 'is-invalid' : '' }}" type="text" name="employe_orgin" id="employe_orgin" value="{{ old('employe_orgin', $employe->employe_orgin) }}">
                @if($errors->has('employe_orgin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_orgin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_orgin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employe_salary">{{ trans('cruds.employe.fields.employe_salary') }}</label>
                <input class="form-control {{ $errors->has('employe_salary') ? 'is-invalid' : '' }}" type="number" name="employe_salary" id="employe_salary" value="{{ old('employe_salary', $employe->employe_salary) }}" step="0.01">
                @if($errors->has('employe_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.employe.fields.employe_contract') }}</label>
                <select class="form-control {{ $errors->has('employe_contract') ? 'is-invalid' : '' }}" name="employe_contract" id="employe_contract">
                    <option value disabled {{ old('employe_contract', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employe::EMPLOYE_CONTRACT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('employe_contract', $employe->employe_contract) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('employe_contract'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_contract') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_contract_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employe_start">{{ trans('cruds.employe.fields.employe_start') }}</label>
                <input class="form-control date {{ $errors->has('employe_start') ? 'is-invalid' : '' }}" type="text" name="employe_start" id="employe_start" value="{{ old('employe_start', $employe->employe_start) }}">
                @if($errors->has('employe_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employe_end">{{ trans('cruds.employe.fields.employe_end') }}</label>
                <input class="form-control date {{ $errors->has('employe_end') ? 'is-invalid' : '' }}" type="text" name="employe_end" id="employe_end" value="{{ old('employe_end', $employe->employe_end) }}">
                @if($errors->has('employe_end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employe_end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.employe_end_helper') }}</span>
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
    var uploadedCinFileMap = {}
Dropzone.options.cinFileDropzone = {
    url: '{{ route('admin.employes.storeMedia') }}',
    maxFilesize: 4, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="cin_file[]" value="' + response.name + '">')
      uploadedCinFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedCinFileMap[file.name]
      }
      $('form').find('input[name="cin_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($employe) && $employe->cin_file)
          var files =
            {!! json_encode($employe->cin_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="cin_file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection