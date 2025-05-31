<?php

namespace app\ThirdPartyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class NotificationService
{
    function sendFCMNotification($deviceToken, $title, $body)
    {

        try {
            $factory = (new Factory)->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')));
            $messaging = $factory->createMessaging();

            $message = CloudMessage::withTarget('token', $deviceToken)
                ->withNotification(Notification::create($title, $body));

            $messaging->send($message);

        } catch (\Throwable $e) {
            Log::error('❌ Lỗi khi gửi FCM notification: ' . $e->getMessage());
            Log::error($e);
        }
    }

    public function storeFCMToken(Request $request)
    {
        Log::info($request);
        auth()->user()->update(['fcm_token' => $request->fcm_token]);
    }
}
