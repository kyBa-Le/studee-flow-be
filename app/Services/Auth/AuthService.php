<?php

namespace App\Services\Auth;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function login($email, $password) {
        $user = $this->repository->findByEmail($email);
        if (!$user || !Hash::check($password, $user->password)) {
            return null;
        }

        try {
            return JWTAuth::fromUser($user);
        } catch (JWTException $e) {
            return null;
        }
    }

}
