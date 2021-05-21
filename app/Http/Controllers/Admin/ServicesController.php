<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Service::with(['category'])->select(sprintf('%s.*', (new Service())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'service_show';
                $editGate = 'service_edit';
                $deleteGate = 'service_delete';
                $crudRoutePart = 'services';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('service_name', function ($row) {
                return $row->service_name ? $row->service_name : '';
            });
            $table->editColumn('service_price', function ($row) {
                return $row->service_price ? $row->service_price : '';
            });
            $table->editColumn('service_min_price', function ($row) {
                return $row->service_min_price ? $row->service_min_price : '';
            });
            $table->addColumn('category_catergory_name', function ($row) {
                return $row->category ? $row->category->catergory_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category']);

            return $table->make(true);
        }

        $categories = Category::get();

        return view('admin.services.index', compact('categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('catergory_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.services.create', compact('categories'));
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('catergory_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $service->load('category');

        return view('admin.services.edit', compact('categories', 'service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());

        return redirect()->route('admin.services.index');
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->load('category');

        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceRequest $request)
    {
        Service::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
