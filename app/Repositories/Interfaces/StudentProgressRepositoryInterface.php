<?php
namespace App\Repositories\Interfaces;

interface StudentProgressRepositoryInterface
{
    public function getStudentProgressByStudentId($student_id): array;

    public function create(array $studentProgress);
}
