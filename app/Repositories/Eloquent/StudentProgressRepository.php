<?php
namespace App\Repositories\Eloquent;

use App\Models\StudentProgress;
use App\Repositories\Interfaces\StudentProgressRepositoryInterface;

class StudentProgressRepository implements StudentProgressRepositoryInterface
{
    public function getStudentProgressByStudentId($student_id): array
    {
        return StudentProgress::where('student_id', $student_id)->get()->toArray();
    }

    public function create(array $studentProgress)
    {
        return StudentProgress::create($studentProgress);
    }
}
