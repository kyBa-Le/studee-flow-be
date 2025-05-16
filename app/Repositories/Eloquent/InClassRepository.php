<?php

namespace App\Repositories\Eloquent;

use App\Models\InClass;
use App\Repositories\Interfaces\InClassRepositoryInterface;

class InClassRepository implements InClassRepositoryInterface
{
    public function create(array $data)
    {
        return InClass::create($data);
    }

    public function getByStudentIdAndWeekId(int $userId, int $weekId) {
        return InClass::where('user_id', $userId)->where('week_id', $weekId)->get();
    }
}
