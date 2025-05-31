<?php

namespace App\Repositories\Eloquent;

use App\Models\Deadline;
use App\Repositories\Interfaces\DeadlineRepositoryInterface;

class DeadlineRepository implements DeadlineRepositoryInterface
{

    public function create(array $deadline): void
    {
        Deadline::create($deadline);
    }

    public function getAllByClassroomId(int $classroomId): array
    {
        return Deadline::query()->where('classroom_id', $classroomId)->get()->toArray();
    }
}
