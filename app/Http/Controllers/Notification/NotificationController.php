<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotification(Request $request, $id)
    {
        return [
            'notification' => Notification::where('id_user', $id)->get()
        ];
    }
}
