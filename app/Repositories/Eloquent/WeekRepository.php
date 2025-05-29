<?php
namespace App\Repositories\Eloquent;

use App\Models\Week;
use App\Repositories\Interfaces\WeekRepositoryInterface;

class WeekRepository implements WeekRepositoryInterface
{
    public function getAllWeeksByStudentId($studentId): array
    {
        return Week::all()->toArray();
    }

    public function createWeek($week)
    {
        return Week::query()->create($week);
    }
}
