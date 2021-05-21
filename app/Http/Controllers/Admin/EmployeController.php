<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmployeRequest;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Models\Employe;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmployeController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('employe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Employe::query()->select(sprintf('%s.*', (new Employe())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'employe_show';
                $editGate = 'employe_edit';
                $deleteGate = 'employe_delete';
                $crudRoutePart = 'employes';

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
            $table->editColumn('employe_fname', function ($row) {
                return $row->employe_fname ? $row->employe_fname : '';
            });
            $table->editColumn('employe_lname', function ($row) {
                return $row->employe_lname ? $row->employe_lname : '';
            });
            $table->editColumn('employe_cin', function ($row) {
                return $row->employe_cin ? $row->employe_cin : '';
            });
            $table->editColumn('employe_birthday', function ($row) {
                return $row->employe_birthday ? $row->employe_birthday : '';
            });
            $table->editColumn('employe_orgin', function ($row) {
                return $row->employe_orgin ? $row->employe_orgin : '';
            });
            $table->editColumn('employe_salary', function ($row) {
                return $row->employe_salary ? $row->employe_salary : '';
            });
            $table->editColumn('employe_contract', function ($row) {
                return $row->employe_contract ? Employe::EMPLOYE_CONTRACT_SELECT[$row->employe_contract] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.employes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('employe_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.employes.create');
    }

    public function store(StoreEmployeRequest $request)
    {
        $employe = Employe::create($request->all());

        foreach ($request->input('cin_file', []) as $file) {
            $employe->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cin_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $employe->id]);
        }

        return redirect()->route('admin.employes.index');
    }

    public function edit(Employe $employe)
    {
        abort_if(Gate::denies('employe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.employes.edit', compact('employe'));
    }

    public function update(UpdateEmployeRequest $request, Employe $employe)
    {
        $employe->update($request->all());

        if (count($employe->cin_file) > 0) {
            foreach ($employe->cin_file as $media) {
                if (!in_array($media->file_name, $request->input('cin_file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $employe->cin_file->pluck('file_name')->toArray();
        foreach ($request->input('cin_file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $employe->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cin_file');
            }
        }

        return redirect()->route('admin.employes.index');
    }

    public function show(Employe $employe)
    {
        abort_if(Gate::denies('employe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.employes.show', compact('employe'));
    }

    public function destroy(Employe $employe)
    {
        abort_if(Gate::denies('employe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employe->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeRequest $request)
    {
        Employe::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('employe_create') && Gate::denies('employe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Employe();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
