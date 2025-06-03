<?php
namespace App\Repositories\Eloquent;

use App\Models\Notification;
use App\Repositories\Interfaces\NotificationRepositoryInterface;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function getByUserId($receiver_id): array
    {
        return Notification::where('receiver_id', $receiver_id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }
    public function markAsRead($notificationId): bool
    {
        $notification = Notification::find($notificationId);
        if ($notification) {
            $notification->is_read = true;
            $notification->save();
            return true;
        }
        return false;
    }
}
