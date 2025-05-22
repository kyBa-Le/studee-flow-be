<?php
namespace App\Services\StudentProgress;

use App\Models\StudentProgress;
use App\Repositories\Interfaces\StudentProgressRepositoryInterface;

class StudentProgressService
{
    protected StudentProgressRepositoryInterface $studentProgressRepository;

    public function __construct(StudentProgressRepositoryInterface $studentProgressRepository)
    {
        $this->studentProgressRepository = $studentProgressRepository;
    }
    public function getStudentProgressByStudentId($student_id): array
    {
        return $this->studentProgressRepository->getStudentProgressByStudentId($student_id);
    }
}
