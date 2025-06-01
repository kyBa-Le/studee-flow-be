<?php
namespace App\Repositories\Interfaces;

interface NotificationRepositoryInterface
{
    public function getByUserId($receiver_id): array;
    public function markAsRead($notificationId): bool;
}
