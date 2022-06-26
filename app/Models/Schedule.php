<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'time_from',
        'time_to',
    ];

    public static function generate(Request $request)
    {
        $schedules = [];

        $dates = [];
        $startDate = strtotime($request->date_from);
        $endDate = strtotime($request->date_to);

        while ($startDate <= $endDate) {
            $dates[] = date('Y-m-d', $startDate);
            $startDate += 60 * 60 * 24;
        }

        foreach ($dates as $date) {
            $times = [];
            $startTime = strtotime($date . '' . $request->time_from);
            $endTime = strtotime($date . '' . $request->time_to);

            while ($startTime < $endTime) {
                $times[] = date('G:i', $startTime);
                $startTime += 60 * 60;
            }

            foreach ($times as $time) {
                $schedules[] = [
                    'date' => $date,
                    'time_from' => $time,
                    'time_to' => date('G:i', strtotime($date . ' ' . $time) + 60 * 60),
                ];
            }
        }

        return $schedules;
    }
}
