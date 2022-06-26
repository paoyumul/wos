<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'service_id' => function () {
                return Service::factory()->create()->id;
            },
            'date' => date('Y-m-d'),
            'time_from' => '08:00:00',
            'time_to' => '09:00:00',
        ];
    }
}
