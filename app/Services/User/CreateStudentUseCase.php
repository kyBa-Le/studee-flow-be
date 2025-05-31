<?php

namespace App\Services\User;

use App\Repositories\Interfaces\DeadlineTrackingRepositoryInterface;
use App\Repositories\Interfaces\StudentProgressRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class CreateStudentUseCase
{
    protected UserRepositoryInterface $userRepository;
    protected StudentProgressRepositoryInterface $studentProgressRepository;
    protected DeadlineTrackingRepositoryInterface $deadlineTrackingRepository;

    public function __construct(UserRepositoryInterface $userRepository,
                                StudentProgressRepositoryInterface $studentProgressRepository,
                                DeadlineTrackingRepositoryInterface $deadlineTrackingRepository)
    {
        $this->userRepository = $userRepository;
        $this->studentProgressRepository = $studentProgressRepository;
        $this->deadlineTrackingRepository = $deadlineTrackingRepository;
    }

    public function handle($student)
    {
        $createdStudent = $this->userRepository->create($student);
        if ($createdStudent) {
            $this->studentProgressRepository->create(["student_id" => $createdStudent->id]);
            $this->deadlineTrackingRepository->create(["student_id" => $createdStudent->id]);
        }
    }
}
