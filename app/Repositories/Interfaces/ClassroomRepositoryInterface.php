<?php
namespace App\Repositories\Interfaces;

use App\Models\Classroom;

interface ClassroomRepositoryInterface
{
    public function getAllByTeacherId($id): array;
}
