<?php
namespace App\Repositories\Interfaces;

use App\Models\Subject;

interface SubjectRepositoryInterface
{
    public function getAllByClassroomId($id): array;
}
