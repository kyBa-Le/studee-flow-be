<?php

namespace App\Http\Controllers;

use App\Services\Notification\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function getUserNotifications(Request $request)
    {
        $userId = $request->user()->id;
        $notifications = $this->notificationService->getNotificationsByReceiverId($userId);
        return response()->json($notifications);
    }

      public function markAsRead(Request $request, $notificationId)
    {
        $success = $this->notificationService->markNotificationAsRead($notificationId);
        return response()->json(['success' => $success]);
    }
}
