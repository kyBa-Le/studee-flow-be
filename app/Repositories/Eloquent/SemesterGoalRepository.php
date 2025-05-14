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
}
