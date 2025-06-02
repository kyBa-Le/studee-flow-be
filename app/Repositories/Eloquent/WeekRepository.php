<?php
namespace App\Repositories\Eloquent;

use App\Models\Week;
use App\Repositories\Interfaces\WeekRepositoryInterface;

class WeekRepository implements WeekRepositoryInterface
{
    public function getAllWeeksByStudentId($studentId): array
    {
        return Week::where("student_id", $studentId)->get()->toArray();
    }

    public function createWeek($week)
    {
        return Week::query()->create($week);
    }

    public function updateWeek($weekId, $data) 
    {
        return Week::query()->where("id", "=", $weekId)->update($data);
    }
}
