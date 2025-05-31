<?php
namespace App\Repositories\Interfaces;

interface NotificationRepositoryInterface
{
    public function getByUserId($userId): array;
    public function markAsRead($notificationId): bool;
}