<?php
namespace App\Repositories\Interfaces;

use App\Models\Task;

interface TaskRepositoryInterface
{
    public function getAll(): array;

    public function getAllByStudentId($id): array;
}
