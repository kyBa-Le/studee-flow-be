<?php

namespace App\Repositories\Interfaces;

interface InClassRepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function getByStudentIdAndWeekId(int $userId, int $weekId);
}