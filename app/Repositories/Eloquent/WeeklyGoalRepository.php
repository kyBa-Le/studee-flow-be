<?php
namespace App\Repositories\Eloquent;

use App\Models\WeeklyGoal;
use App\Repositories\Interfaces\WeeklyGoalRepositoryInterface;

class WeeklyGoalRepository implements WeeklyGoalRepositoryInterface
{
    public function create(array $data)
    {
        return WeeklyGoal::create($data);
    }

    public function getByStudentIdAndWeekId($userId, $weekId)
    {
        return WeeklyGoal::where('student_id', $userId)->where('week_id', $weekId)->get()->toArray();
    }

    public function update($id, array $data)
    {
        $weekly = WeeklyGoal::findOrFail($id);
        $weekly->update($data);
        return $weekly;
    }
}
