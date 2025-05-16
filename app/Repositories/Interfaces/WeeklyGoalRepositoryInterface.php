<?php

namespace App\Repositories\Interfaces;

use App\Models\WeeklyGoal;

interface WeeklyGoalRepositoryInterface
{
    public function create(array $data);

    public function update($id, array $data);

    public function getByStudentIdAndWeekId($userId, $weekId);
}
