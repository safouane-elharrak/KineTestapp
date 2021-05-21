@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.payment.fields.payement_method') }}</label>
                <select class="form-control {{ $errors->has('payement_method') ? 'is-invalid' : '' }}" name="payement_method" id="payement_method" required>
                    <option value disabled {{ old('payement_method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Payment::PAYEMENT_METHOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payement_method', $payment->payement_method) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payement_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payement_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payement_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_date">{{ trans('cruds.payment.fields.payment_date') }}</label>
                <input class="form-control date {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date', $payment->payment_date) }}">
                @if($errors->has('payment_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_ref">{{ trans('cruds.payment.fields.payment_ref') }}</label>
                <input class="form-control {{ $errors->has('payment_ref') ? 'is-invalid' : '' }}" type="text" name="payment_ref" id="payment_ref" value="{{ old('payment_ref', $payment->payment_ref) }}">
                @if($errors->has('payment_ref'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_ref') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_ref_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.payment.fields.note') }}</label>
                <input class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" type="text" name="note" id="note" value="{{ old('note', $payment->note) }}">
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payement_amount">{{ trans('cruds.payment.fields.payement_amount') }}</label>
                <input class="form-control {{ $errors->has('payement_amount') ? 'is-invalid' : '' }}" type="number" name="payement_amount" id="payement_amount" value="{{ old('payement_amount', $payment->payement_amount) }}" step="0.01" required>
                @if($errors->has('payement_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payement_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payement_amount_helper') }}</span>
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