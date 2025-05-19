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

    public function update($weeklyGoal, $newData)
    {
        $weeklyGoal->update($newData);
        return $weeklyGoal;
    }

    public function findById($id)
    {
        return WeeklyGoal::find($id);
    }
}
