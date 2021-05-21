<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('appointment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Appointment::with(['patient', 'appointment_created_by', 'appointment_update_by'])->select(sprintf('%s.*', (new Appointment())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'appointment_show';
                $editGate = 'appointment_edit';
                $deleteGate = 'appointment_delete';
                $crudRoutePart = 'appointments';

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
            $table->addColumn('patient_patient_fname', function ($row) {
                return $row->patient ? $row->patient->patient_fname : '';
            });

            $table->editColumn('patient.patient_lname', function ($row) {
                return $row->patient ? (is_string($row->patient) ? $row->patient : $row->patient->patient_lname) : '';
            });
/** */             $table->editColumn('start_time', function ($row) {
    return $row->start_time ? $row->start_time : '';
});              $table->editColumn('finish_time', function ($row) {
    return $row->finish_time ? $row->finish_time : '';
});
/** */

            $table->editColumn('appointment_type', function ($row) {
                return $row->appointment_type ? Appointment::APPOINTMENT_TYPE_SELECT[$row->appointment_type] : '';
            });
            $table->editColumn('appointment_status', function ($row) {
                return $row->appointment_status ? Appointment::APPOINTMENT_STATUS_SELECT[$row->appointment_status] : '';
            });
            $table->editColumn('appointment_note', function ($row) {
                return $row->appointment_note ? $row->appointment_note : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'patient']);

            return $table->make(true);
        }

        $patients = Patient::get();
        $users    = User::get();

        return view('admin.appointments.index', compact('patients', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('patient_fname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.appointments.create', compact('patients'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create($request->all());

        return redirect()->route('admin.appointments.index');
    }

    public function edit(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('patient_fname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointment->load('patient', 'appointment_created_by', 'appointment_update_by');

        return view('admin.appointments.edit', compact('patients', 'appointment'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->all());

        return redirect()->route('admin.appointments.index');
    }

    public function show(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->load('patient', 'appointment_created_by', 'appointment_update_by');

        return view('admin.appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppointmentRequest $request)
    {
        Appointment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
