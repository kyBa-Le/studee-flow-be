<?php

namespace App\Repositories\Interfaces;

use App\Models\WeeklyGoal;

interface WeeklyGoalRepositoryInterface
{
    public function create(array $data);

    public function update($id, $data);

    public function getByStudentIdAndWeekId($userId, $weekId);

    public function findById($id);
}
