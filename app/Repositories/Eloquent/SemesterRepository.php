<?php
namespace App\Repositories\Eloquent;

use App\Models\Semester;
use App\Repositories\Interfaces\SemesterRepositoryInterface;
class SemesterRepository implements SemesterRepositoryInterface
{
    public function getCurrentSemesterByClassroomId($id, $today): array
    {
        return Semester::where('classroom_id', $id)
            ->where('started_at', '<=', $today)
            ->where('ended_at', '>=', $today)
            ->get()
            ->toArray();
    }
}