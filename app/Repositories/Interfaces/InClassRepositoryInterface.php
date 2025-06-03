<?php

namespace App\Repositories\Interfaces;

interface InClassRepositoryInterface
{
    public function create(array $data);

    public function update(int $id, $newInClass);

    public function getByStudentIdAndWeekId(int $studentId, int $weekId);

    public function getById(int $id);
}
