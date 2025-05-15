<?php

namespace App\Repositories\Interfaces;

interface SemesterGoalRepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function getSemesterGoalsByStudentId(int $userId, int $semesterId);
}
