@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.invoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                        </th>
                        <td>
                            {{ $invoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_client_name') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_client_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_cin') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_cin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_ice') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_ice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_address') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_ttc') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_ttc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_ht') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_ht }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_tva') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_tva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_discount') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_discount_type') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_discount_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_reason') }}
                        </th>
                        <td>
                            {{ App\Models\Invoices::INVOICE_REASON_SELECT[$invoice->invoice_reason] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_status') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service name</th>
                        <th>Service quantity</th>
                        <th>Price per unit</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($invoicesLines as $invoiceLine)
                    <tr>
                        <td>{{$invoiceLine->id}}</td>
                        <td>{{$invoiceLine->service->service_name}}</td>
                        <td>{{$invoiceLine->invoiceLine_service_quantity}}</td>
                        <td>{{$invoiceLine->invoiceLine_price_per_unit}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection