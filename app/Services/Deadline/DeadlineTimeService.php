<?php

namespace App\Services\Deadline;

use App\Models\Deadline;
use Carbon\Carbon;

class DeadlineTimeService
{
    public static function getTheEndedTime(Deadline $deadline)
    {
        $date = Carbon::parse($deadline->date);
        $time = Carbon::parse($deadline->ended_at);

        return Carbon::create(
            $date->year,
            $date->month,
            $date->day,
            $time->hour,
            $time->minute,
            $time->second
        );
    }

    public static function getTheStartedTime(Deadline $deadline)
    {
        $date = Carbon::parse($deadline->date);
        $time = Carbon::parse($deadline->started_at);

        return Carbon::create(
            $date->year,
            $date->month,
            $date->day,
            $time->hour,
            $time->minute,
            $time->second
        );
    }

}
