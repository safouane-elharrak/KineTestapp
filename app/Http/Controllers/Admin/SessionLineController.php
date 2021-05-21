<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySessionLineRequest;
use App\Http\Requests\StoreSessionLineRequest;
use App\Http\Requests\UpdateSessionLineRequest;
use App\Models\Service;
use App\Models\Session;
use App\Models\SessionLine;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SessionLineController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('session_line_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessionLines = SessionLine::with(['session', 'service'])->get();

        $sessions = Session::get();

        $services = Service::get();

        return view('admin.sessionLines.index', compact('sessionLines', 'sessions', 'services'));
    }

    public function create()
    {
        abort_if(Gate::denies('session_line_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('service_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sessionLines.create', compact('services'));
    }

    public function store(StoreSessionLineRequest $request)
    {
        $sessionLine = SessionLine::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $sessionLine->id]);
        }

        return redirect()->route('admin.session-lines.index');
    }

    public function edit(SessionLine $sessionLine)
    {
        abort_if(Gate::denies('session_line_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('service_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sessionLine->load('session', 'service');

        return view('admin.sessionLines.edit', compact('services', 'sessionLine'));
    }

    public function update(UpdateSessionLineRequest $request, SessionLine $sessionLine)
    {
        $sessionLine->update($request->all());

        return redirect()->route('admin.session-lines.index');
    }

    public function show(SessionLine $sessionLine)
    {
        abort_if(Gate::denies('session_line_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessionLine->load('session', 'service');

        return view('admin.sessionLines.show', compact('sessionLine'));
    }

    public function destroy(SessionLine $sessionLine)
    {
        abort_if(Gate::denies('session_line_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessionLine->delete();

        return back();
    }

    public function massDestroy(MassDestroySessionLineRequest $request)
    {
        SessionLine::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('session_line_create') && Gate::denies('session_line_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SessionLine();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
