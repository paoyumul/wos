<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => date('Y-m-d'),
            'time_from' => '08:00',
            'time_to' => '17:00',
        ];
    }
}
