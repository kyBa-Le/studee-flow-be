<?php

namespace App\Repositories\Eloquent;

use App\Models\SemesterGoal;
use App\Repositories\Interfaces\SemesterGoalRepositoryInterface;

class SemesterGoalRepository implements SemesterGoalRepositoryInterface
{
    public function create(array $data)
    {
        return SemesterGoal::create($data);
    }

    public function update(int $id, array $data)
    {
        $goal = SemesterGoal::where('id', $id)
            ->where('student_id', $data['student_id'])
            ->first();

        if (!$goal) {
            throw new \Exception('Goal not found or does not belong to the student');
        }

        $goal->update($data);

        return $goal;
    }

    public function getCurrentSemesterGoal(int $userId, int $semesterId) {
        return SemesterGoal::where('student_id', $userId)->where('semester_id', $semesterId)->get();
    }
}
