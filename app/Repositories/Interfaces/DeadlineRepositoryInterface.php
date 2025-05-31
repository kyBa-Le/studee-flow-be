<?php

namespace App\Repositories\Interfaces;

interface DeadlineRepositoryInterface
{
    public function create(array $deadline): void;
}
