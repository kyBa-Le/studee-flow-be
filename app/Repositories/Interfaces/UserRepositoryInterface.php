<?php
namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getAll(): array;

    public function findById(int $id): ?User;

    public function create(array $data): User;

    public function update(User $user, array $data): bool;

    public function delete(User $user): bool;

    public function findByEmail(string $email): ?User;

    public function findAllByRole(string $role): array;

    public function findAllByRoleWithPagination(string $role, int $size): array;
}
