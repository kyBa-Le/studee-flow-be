<?php
namespace App\Repositories\Eloquent;

use App\Models\Achievement;
use App\Repositories\Interfaces\AchievementRepositoryInterface;

class AchievementRepository implements AchievementRepositoryInterface 
{
    public function getAll(): array
    {
        return Achievement::all()->toArray();
    }

    public function getAllByStudentId($id): array
    {
        return Achievement::where('student_id', $id)->get()->toArray();
    }
}