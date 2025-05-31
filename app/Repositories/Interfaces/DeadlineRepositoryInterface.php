<?php

namespace App\Repositories\Interfaces;

use App\Models\Deadline;

interface DeadlineRepositoryInterface
{
    public function create(array $deadline): Deadline;

    public function getAllByClassroomId(int $classroomId): array;
}
