<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Appointment::class);

        if (auth()->user()->role === 'Admin') {
            $appointments = Appointment::with(['user', 'service', 'schedule'])
                ->paginate(30);
        } else {
            $appointments = Appointment::with(['user', 'service', 'schedule'])
                ->where('user_id', auth()->user()->id)
                ->paginate(30);
        }

        return inertia('Appointments/Index', [
            'data' => [
                'appointments' => $appointments->items(),
                'paginator' => $appointments,
            ],
        ]);
    }

    public function create()
    {
        $this->authorize('create', Appointment::class);

        $schedules = Schedule::doesntHave('appointment')
            ->orderBy('date', 'desc')
            ->orderBy('time_from', 'desc')
            ->get(['id', 'date', 'time_from']);

        return inertia('Appointments/Create', [
            'data' => [
                'services' => Service::orderBy('name', 'asc')->get(['id', 'name', 'price']),
                'schedules' => $schedules,
                'users' => User::orderBy('first_name', 'asc')->get(['id', 'first_name', 'last_name']),
            ],
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Appointment::class);

        $request->validate([
            'user_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'schedule_id' => 'required|numeric',
        ]);

        Appointment::create($request->all());

        session()->flash('message', 'The appointment has been created.');

        return back();
    }

    public function edit(Appointment $appointment)
    {
        $this->authorize('update', $appointment);

        $schedules = Schedule::doesntHave('appointment')
            ->orWhere('id', $appointment->schedule_id)
            ->orderBy('date', 'desc')
            ->orderBy('time_from', 'desc')
            ->get(['id', 'date', 'time_from']);

        return inertia('Appointments/Edit', [
            'data' => [
                'appointment' => $appointment,
                'services' => Service::orderBy('name', 'asc')->get(['id', 'name', 'price']),
                'schedules' => $schedules,
                'users' => User::orderBy('first_name', 'asc')->get(['id', 'first_name', 'last_name']),
            ],
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $this->authorize('update', $appointment);

        $request->validate([
            'user_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'schedule_id' => 'required|numeric',
        ]);

        $appointment->update($request->all());

        session()->flash('message', 'The appointment has been updated.');

        return redirect()->route('admin.appointments.edit', $appointment->id);
    }

    public function destroy(Appointment $appointment)
    {
        $this->authorize('delete', $appointment);

        $appointment->delete();

        session()->flash('message', 'The appointment has been deleted.');

        return back();
    }
}
