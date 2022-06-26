<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Schedule;
use App\Policies\AppointmentPolicy;
use App\Policies\SchedulePolicy;
use App\Policies\ServicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Service;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         Service::class => ServicePolicy::class,
         Schedule::class => SchedulePolicy::class,
         Appointment::class => AppointmentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
