<?php
namespace App\Repositories\Interfaces;

interface SemesterRepositoryInterface
{
    public function getCurrentSemesterByClassroomId($id, $today): array;

    public function create(array $data);

}
