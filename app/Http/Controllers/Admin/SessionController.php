<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySessionRequest;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\Employe;
use App\Models\Patient;
use App\Models\Session;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessions = Session::with(['patient', 'user', 'employe'])->get();

        $patients = Patient::get();

        $users = User::get();

        $employes = Employe::get();

        return view('admin.sessions.index', compact('sessions', 'patients', 'users', 'employes'));
    }

    public function create()
    {
        abort_if(Gate::denies('session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('patient_gender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employes = Employe::all()->pluck('employe_fname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sessions.create', compact('patients', 'users', 'employes'));
    }

    public function store(StoreSessionRequest $request)
    {
        $session = Session::create($request->all());

        return redirect()->route('admin.sessions.index');
    }

    public function edit(Session $session)
    {
        abort_if(Gate::denies('session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('patient_gender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employes = Employe::all()->pluck('employe_fname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $session->load('patient', 'user', 'employe');

        return view('admin.sessions.edit', compact('patients', 'employes', 'session'));
    }

    public function update(UpdateSessionRequest $request, Session $session)
    {
        $session->update($request->all());

        return redirect()->route('admin.sessions.index');
    }

    public function show(Session $session)
    {
        abort_if(Gate::denies('session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $session->load('patient', 'user', 'employe');

        return view('admin.sessions.show', compact('session'));
    }

    public function destroy(Session $session)
    {
        abort_if(Gate::denies('session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $session->delete();

        return back();
    }

    public function massDestroy(MassDestroySessionRequest $request)
    {
        Session::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
