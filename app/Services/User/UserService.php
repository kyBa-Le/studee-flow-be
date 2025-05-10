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

    public function createStudents($emails, $password, $classroom_id) {
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
}
