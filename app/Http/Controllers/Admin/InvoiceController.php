<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoices;
use Gate;
use App\Models\Service; 
use App\Models\InvoiceLine;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Invoices::query()->select(sprintf('%s.*', (new Invoices())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'invoice_show';
                $editGate = 'invoice_edit';
                $deleteGate = 'invoice_delete';
                $crudRoutePart = 'invoices';
                $printGate = 'invoice_print';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'printGate',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('invoice_client_name', function ($row) {
                return $row->invoice_client_name ? $row->invoice_client_name : '';
            });
            $table->editColumn('invoice_ttc', function ($row) {
                return $row->invoice_ttc ? $row->invoice_ttc : '';
            });
            $table->editColumn('invoice_ht', function ($row) {
                return $row->invoice_ht ? $row->invoice_ht : '';
            });
            $table->editColumn('invoice_tva', function ($row) {
                return $row->invoice_tva ? $row->invoice_tva : '';
            });
            $table->editColumn('invoice_discount', function ($row) {
                return $row->invoice_discount ? $row->invoice_discount : '';
            });
            $table->editColumn('invoice_status', function ($row) {
                return $row->invoice_status ? $row->invoice_status : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.invoices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('service_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoices.create', compact('services'));
    }

    public function store(StoreInvoiceRequest $request)
    {
            $invoice = new Invoices;
            $invoice->invoice_client_name   = $request->input('invoice_client_name');
            $invoice->invoice_cin           = $request->input('invoice_cin');
            $invoice->invoice_ice           = $request->input('invoice_ice');
            $invoice->invoice_address       = $request->input('invoice_address');
            $invoice->invoice_ttc           = $request->input('invoice_ttc');
            $invoice->invoice_ht            = $request->input('invoice_ht');
            $invoice->invoice_tva           = $request->input('invoice_tva');
            $invoice->invoice_discount      = $request->input('invoice_discount');
            $invoice->invoice_discount_type = $request->input('invoice_discount_type');
            $invoice->invoice_reason        = $request->input('invoice_reason');
            $invoice->invoice_status        = $request->input('invoice_status');
            $invoice->invoice_date          = $request->input('invoice_date');
            $invoice->save();

            $services_ids = $request->input('service_id');
            $quantites    = $request->input('invoiceLine_service_quantity');
            $prices       = $request->input('invoiceLine_price_per_unit');
            for($i=0;$i<count($quantites);$i++){
                $service_id  = $services_ids[$i];
                $quantite    = $quantites[$i];
                $price       = $prices[$i];
                    $invoiceLine = InvoiceLine::create([
                        'service_id' => $service_id,
                        'invoice_id' => $invoice->id,
                        'invoiceLine_service_quantity' => $quantite,
                        'invoiceLine_price_per_unit' => $price
                    ]);
            }
        return redirect()->route('admin.invoices.index');
    }

    public function edit(Invoices $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoicesLines = InvoiceLine::where('invoice_id',$invoice->id)->get();
        $services      = Service::all()->pluck('service_name', 'id')->prepend(trans('global.pleaseSelect'), '');
                
        return view('admin.invoices.edit', compact('invoice','invoicesLines','services'));
    }

    public function update(UpdateInvoiceRequest $request, Invoices $invoice)
    {
        $invoic = Invoices::where('id',$invoice->id)
        ->update([
            'invoice_client_name'   => $request->input('invoice_client_name'),
            'invoice_cin'           => $request->input('invoice_cin'),
            'invoice_ice'           => $request->input('invoice_ice'),
            'invoice_address'       => $request->input('invoice_address'),
            'invoice_ttc'           => $request->input('invoice_ttc'),
            'invoice_ht'            => $request->input('invoice_ht'),
            'invoice_tva'           => $request->input('invoice_tva'),
            'invoice_discount'      => $request->input('invoice_discount'),
            'invoice_discount_type' => $request->input('invoice_discount_type'),
            'invoice_reason'        => $request->input('invoice_reason'),
            'invoice_status'        => $request->input('invoice_status'),
            'invoice_date'          => $request->input('invoice_date')
        ]);
        $id = InvoiceLine::where('invoice_id', $invoice->id)->pluck('id')->all();
        $services_ids = $request->input('service_id');
        $quantites    = $request->input('invoiceLine_service_quantity');
        $prices       = $request->input('invoiceLine_price_per_unit');
        for($i=0;$i<count($quantites);$i++){
            $service_id  = $services_ids[$i];
            $quantite    = $quantites[$i];
            $price       = $prices[$i];
                $invoiceLine = InvoiceLine::where('id',$id)
                ->update([
                    'service_id' => $service_id,
                    'invoice_id' => $invoice->id,
                    'invoiceLine_service_quantity' => $quantite,
                    'invoiceLine_price_per_unit' => $price
                ]);
        }

        return redirect()->route('admin.invoices.index');
    }

    public function show(Invoices $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoicesLines = InvoiceLine::where('invoice_id',$invoice->id)->get();

        return view('admin.invoices.show', compact('invoice','invoicesLines'));
    }

    public function destroy(Invoices $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceRequest $request)
    {
        Invoices::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function pdf($id){
        //abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $invoice        = Invoices::find($id);
        $invoices_lines = InvoiceLine::where('invoice_id',$id)->get();        
        $nom            = $invoice-> invoice_client_name;   
        $adresse        = $invoice-> invoice_address;
        $cin            = $invoice-> invoice_cin;
        $ht             = $invoice-> invoice_ht;
        $ttc            = $invoice-> invoice_ttc;
        $tva            = $invoice-> invoice_tva;
        $remise         = $invoice-> invoice_discount;
        $date           = $invoice-> invoice_date;
        $sequence       = $invoice-> invoice_sequence;

        $taxableAmount = $ht - $remise;
        $totalTaxes = $taxableAmount * ($tva/100);
        
        $totalAmount = $ht + $totalTaxes;
        for($i=0;$i<count($invoices_lines);$i++){
            $invoice_line = $invoices_lines[$i];
            $nameService  = $invoice_line->service->service_name;
            $price        = $invoice_line->invoiceLine_price_per_unit;
            $priceHt      = $price - ($price * $tva/100);
            $quantite     = $invoice_line->invoiceLine_service_quantity;
            $item         = (new InvoiceItem())
                            ->title($nameService)
                            ->pricePerUnit($priceHt)
                            ->quantity($quantite);
            $items[]      = $item;
        }
        $client = new Party([
            'name'          => 'Cabinet Kine',
            
            'custom_fields' => [
                'telephone'    => '06 66 66 66 66',
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          =>  $nom,
            'address'       =>  $adresse,
            'custom_fields' => [
                'cin client ' => $cin
            ],
        ]);
        

        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($client)
            ->date(Carbon::parse($date))
            ->dateFormat('Y-m-d')
            ->name("Facture") //nom de la facture
            //->discountByPercent(10) //reduction
            //->taxRate($tva) //tva 
            ->currencySymbol('DH')
            ->currencyCode('DH')
            
            ->logo(public_path('vendor/invoices/sample-logo.png'))
            ->sequence($sequence)
            //->filename('invoice' . '_' . Carbon::now()->format('Y') . '_' . $sequence)
            ->addItems($items)
            ->totalDiscount($remise)
            ->taxableAmount($taxableAmount)
            ->totalTaxes($totalTaxes)
            
            ->totalAmount($totalAmount);
            
        return $invoice->stream();
    }
    public function findPrice(Request $request){
        $price = Service::select('service_price')->where('id',$request->id)->first();
        return response()->json($price);
    }
}
