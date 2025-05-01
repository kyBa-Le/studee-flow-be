<?php
namespace App\Repositories\Interfaces;

use App\Models\Achievement;

interface AchievementRepositoryInterface
{
    public function getAll(): array;

    public function getAllByStudentId($id): array;
}
