<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Sale;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use App\Policies\AppointmentPolicy;
use App\Policies\SalePolicy;
use App\Policies\SchedulePolicy;
use App\Policies\ServicePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         User::class => UserPolicy::class,
         Service::class => ServicePolicy::class,
         Schedule::class => SchedulePolicy::class,
         Appointment::class => AppointmentPolicy::class,
         Sale::class => SalePolicy::class,
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
