<?php
namespace App\Services\Task;

use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskService 
{
    protected TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    
    public function getAllTasksByStudentId ($id) 
    {
        return $this->taskRepository->getAllByStudentId($id);
    }
}