<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUsers(): array
    {
        return $this->userRepository->getAll();
    }

    public function createUser(array $data): User
    {
        return $this->userRepository->create($data);
    }

    public function updateUser(User $user, array $data): bool
    {
        return $this->userRepository->update($user, $data);
    }

    public function deleteUser(User $user): bool
    {
        return $this->userRepository->delete($user);
    }

    public function findAllUsersByRole(string $role): array
    {
        return $this->userRepository->findAllByRole($role);
    }

    public function findAllUsersByRoleWithPagination(string $role, int $size): array
    {
        return  $this->userRepository->findAllByRoleWithPagination($role, $size);
    }

    public function createStudents($emails, $password, $classroom_id)
    {
        $hashedPassword = Hash::make($password);

        DB::beginTransaction();
        try {
            foreach ($emails as $email) {
                $user = $this->userRepository->create([
                    'email' => $email,
                    'password' => $hashedPassword,
                    'student_classroom_id' => $classroom_id,
                    'full_name' => $email,
                    'role' => 'student'
                ]);
            }
            DB::commit();
            return true;
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return false;
        }
    }
    public function findUserById(int $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    public function updateOwnProfile(User $user, array $data): array
    {
        $allowedFields = ['full_name', 'gender', 'avatar_link', 'current_password', 'new_password', 'confirm_new_password'];
        $filteredData = array_intersect_key($data, array_flip($allowedFields));
        if (
            !empty($filteredData['current_password']) ||
            !empty($filteredData['new_password']) ||
            !empty($filteredData['confirm_new_password'])
        ) {
            if (!Hash::check($filteredData['current_password'] ?? '', $user->password)) {
                return [
                    'status' => false,
                    'message' => 'Current password is incorrect',
                    'code' => 403,
                ];
            }
            if (($filteredData['new_password'] ?? '') !== ($filteredData['confirm_new_password'] ?? '')) {
                return [
                    'status' => false,
                    'message' => 'New password confirmation does not match',
                    'code' => 400,
                ];
            }
            $filteredData['password'] = Hash::make($filteredData['new_password']);
        }
        unset($filteredData['current_password'], $filteredData['new_password'], $filteredData['confirm_new_password']);
        $updated = $this->userRepository->update($user, $filteredData);
        if (!$updated) {
            return [
                'status' => false,
                'message' => 'Update failed',
                'code' => 400,
            ];
        }
        return [
            'status' => true,
            'message' => 'Update successful',
            'code' => 200,
        ];
    }

    public function getAllStudentsByClassroomId($classroom_id): array
    {
        return  $this->userRepository->getAllStudentsByClassroomId($classroom_id);
    }

    public function findTeachersByEmail(mixed $email)
    {
        return $this->userRepository->findByRoleAndEmail("teacher", $email);
    }
}
