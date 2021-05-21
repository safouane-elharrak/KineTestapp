@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoices.update", [$invoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="invoice_client_name">{{ trans('cruds.invoice.fields.invoice_client_name') }}</label>
                <input class="form-control {{ $errors->has('invoice_client_name') ? 'is-invalid' : '' }}" type="text" name="invoice_client_name" id="invoice_client_name" value="{{ old('invoice_client_name', $invoice->invoice_client_name) }}" required>
                @if($errors->has('invoice_client_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_client_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_client_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_cin">{{ trans('cruds.invoice.fields.invoice_cin') }}</label>
                <input class="form-control {{ $errors->has('invoice_cin') ? 'is-invalid' : '' }}" type="text" name="invoice_cin" id="invoice_cin" value="{{ old('invoice_cin', $invoice->invoice_cin) }}">
                @if($errors->has('invoice_cin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_cin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_cin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_ice">{{ trans('cruds.invoice.fields.invoice_ice') }}</label>
                <input class="form-control {{ $errors->has('invoice_ice') ? 'is-invalid' : '' }}" type="text" name="invoice_ice" id="invoice_ice" value="{{ old('invoice_ice', $invoice->invoice_ice) }}">
                @if($errors->has('invoice_ice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_ice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_ice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_address">{{ trans('cruds.invoice.fields.invoice_address') }}</label>
                <input class="form-control {{ $errors->has('invoice_address') ? 'is-invalid' : '' }}" type="text" name="invoice_address" id="invoice_address" value="{{ old('invoice_address', $invoice->invoice_address) }}">
                @if($errors->has('invoice_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_date">{{ trans('cruds.invoice.fields.invoice_date') }}</label>
                <input class="form-control {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="date" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $invoice->invoice_date) }}">
                @if($errors->has('invoice_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_date_helper') }}</span>
            </div>
            <div class="col-md-9 m-auto">
                <table class="table mt-3" id="myTab">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><label for="service_id">{{ trans('cruds.invoice.fields.service') }}</label></td>
                            <th scope="col">Prix par unite</td>
                            <th scope="col">Quantite service</td>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody id="myTabBody">
                        @foreach ($invoicesLines as $invoiceLine)
                        <tr>
                            <th scope="row">
                                <select class="form-control  {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id[]" id="service_id">
                                    @foreach($services as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('service_id') ? old('service_id') : $invoiceLine->service->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('service'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('service') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.invoice.fields.service_helper') }}</span>
                            </th>
                            <td >
                                <input class="form-control {{ $errors->has('invoice_line_price_per_unit') ? 'is-invalid' : '' }}" type="number" name="invoiceLine_price_per_unit[]" value="{{ old('invoiceLine_service_quantity', $invoiceLine->invoiceLine_price_per_unit) }}" >
                                @if($errors->has('invoice_line_price_per_unit'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('invoice_line_price_per_unit') }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <input class="form-control {{ $errors->has('invoiceLine_service_quantity') ? 'is-invalid' : '' }}" type="number" name="invoiceLine_service_quantity[]" value="{{ old('invoiceLine_service_quantity', $invoiceLine->invoiceLine_service_quantity) }}" >
                                @if($errors->has('invoiceLine_service_quantity'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('invoiceLine_service_quantity') }}
                                    </div>
                                @endif
                            </td>
                            <td>
                            <button type="button" onclick="deleteRow(this)" class="btn btn-danger">Supprimer</button>
                            </td>
                        </tr>
                        @endforeach 
                    </tbody> 
                
                </table>
            </div>    
            <div class="form-group">
                <label for="invoice_ttc">{{ trans('cruds.invoice.fields.invoice_ttc') }}</label>
                <input class="form-control {{ $errors->has('invoice_ttc') ? 'is-invalid' : '' }}" type="number" name="invoice_ttc" id="invoice_ttc" value="{{ old('invoice_ttc', $invoice->invoice_ttc) }}" step="0.01">
                @if($errors->has('invoice_ttc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_ttc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_ttc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_ht">{{ trans('cruds.invoice.fields.invoice_ht') }}</label>
                <input class="form-control {{ $errors->has('invoice_ht') ? 'is-invalid' : '' }}" type="number" name="invoice_ht" id="invoice_ht" value="{{ old('invoice_ht', $invoice->invoice_ht) }}" step="0.01">
                @if($errors->has('invoice_ht'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_ht') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_ht_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_tva">{{ trans('cruds.invoice.fields.invoice_tva') }}</label>
                <input class="form-control {{ $errors->has('invoice_tva') ? 'is-invalid' : '' }}" type="text" name="invoice_tva" id="invoice_tva" value="{{ old('invoice_tva', $invoice->invoice_tva) }}">
                @if($errors->has('invoice_tva'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_tva') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_tva_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_discount">{{ trans('cruds.invoice.fields.invoice_discount') }}</label>
                <input class="form-control {{ $errors->has('invoice_discount') ? 'is-invalid' : '' }}" type="text" name="invoice_discount" id="invoice_discount" value="{{ old('invoice_discount', $invoice->invoice_discount) }}">
                @if($errors->has('invoice_discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_discount_type">{{ trans('cruds.invoice.fields.invoice_discount_type') }}</label>
                <input class="form-control {{ $errors->has('invoice_discount_type') ? 'is-invalid' : '' }}" type="text" name="invoice_discount_type" id="invoice_discount_type" value="{{ old('invoice_discount_type', $invoice->invoice_discount_type) }}">
                @if($errors->has('invoice_discount_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_discount_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_discount_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.invoice.fields.invoice_reason') }}</label>
                <select class="form-control {{ $errors->has('invoice_reason') ? 'is-invalid' : '' }}" name="invoice_reason" id="invoice_reason">
                    <option value disabled {{ old('invoice_reason', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Invoices::INVOICE_REASON_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('invoice_reason', $invoice->invoice_reason) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('invoice_reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_status">{{ trans('cruds.invoice.fields.invoice_status') }}</label>
                <input class="form-control {{ $errors->has('invoice_status') ? 'is-invalid' : '' }}" type="text" name="invoice_status" id="invoice_status" value="{{ old('invoice_status', $invoice->invoice_status) }}">
                @if($errors->has('invoice_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_status_helper') }}</span>
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
$(document).ready(function() {
    $(document).on('change','#service_id',function(){
            var somme =0;
            var id=$(this).val();
            var element = $(this).parent().next().children("input");
            $.ajax({
           type:'GET',
           url:"{{ route('admin.invoices.findPrice') }}",
           data:{'id':id},
           dataType:'json',
           success:function(data){
               element.val(data.service_price);

               var somme = data.service_price;
               console.log(somme);
           }
        });
    });
});
function deleteRow(evn) {
    var myRow = evn.parentNode.parentNode.rowIndex;
    document.getElementById("myTab").deleteRow(myRow);
}
</script>
@endsection        