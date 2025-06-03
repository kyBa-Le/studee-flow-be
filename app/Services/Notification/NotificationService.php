<?php
namespace App\Services\Notification;

use App\Repositories\Interfaces\NotificationRepositoryInterface;

class NotificationService
{
    protected NotificationRepositoryInterface $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function getNotificationsByReceiverId($userId)
    {
        return $this->notificationRepository->getByUserId($userId);
    }

    public function markNotificationAsRead($notificationId)
    {
        return $this->notificationRepository->markAsRead($notificationId);
    }
}
