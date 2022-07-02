<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function index()
    {
        $upcomingAppointments = Appointment::with('schedule', 'user', 'service')
            ->whereHas('schedule', function(Builder $query) {
                $query->where('date', '>=', date('Y-m-d H:i:s'));
            })
            ->take(10)
            ->get();

        return inertia('Dashboard', [
            'upcomingAppointments' => $upcomingAppointments,
        ]);
    }
}
