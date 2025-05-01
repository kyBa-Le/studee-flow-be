<?php
namespace App\Repositories\Eloquent;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface 
{
    public function getAll(): array
    {
        return Task::all()->toArray();
    }

    public function getAllByStudentId($id): array
    {
        return Task::where('student_id', $id)->get()->toArray();
    }
}