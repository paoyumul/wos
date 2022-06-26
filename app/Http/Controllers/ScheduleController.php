<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Schedule::class);

        $schedules = Schedule::orderBy('date', 'desc')
            ->orderBy('time_from', 'desc')
            ->paginate(30);

        return inertia('Schedules/Index', [
            'data' => [
                'schedules' => $schedules->items(),
                'paginator' => $schedules,
            ],
        ]);
    }

    public function create()
    {
        $this->authorize('create', Schedule::class);

        return inertia('Schedules/Create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Schedule::class);

        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
            'time_from' => 'required',
            'time_to' => 'required|after:time_from',
        ]);

        $schedules = Schedule::generate($request);

        DB::table('schedules')->insert($schedules);

        session()->flash('message', 'The schedules have been generated.');

        return back();
    }

    public function edit(Schedule $schedule)
    {
        $this->authorize('update', $schedule);

        return inertia('Schedules/Edit', [
            'data' => [
                'schedule' => $schedule,
            ],
        ]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $this->authorize('update', $schedule);

        $request->validate([
            'date' => 'required|date',
            'time_from' => 'required',
            'time_to' => 'required|after:time_from',
        ]);

        $schedule->update($request->all());

        session()->flash('message', 'The schedule has been updated.');

        return redirect()->route('admin.schedules.edit', $schedule->id);
    }

    public function destroy(Schedule $schedule)
    {
        $this->authorize('delete', $schedule);

        $schedule->delete();

        session()->flash('message', 'The schedule has been deleted.');

        return back();
    }
}
