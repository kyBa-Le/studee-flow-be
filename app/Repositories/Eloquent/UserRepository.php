<?php
namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): array
    {
        return User::all()->toArray();
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function findByEmail(string $email): ?User
    {
        return User::query()->where('email', $email)->first();
    }

    public function findAllByRole(string $role): array
    {
        return User::query()->where('role', $role)->get()->toArray();
    }

    public function findAllByRoleWithPagination(string $role, int $size): array
    {
        return User::query()->where('role', $role)->paginate($size)->toArray();
    }
}
