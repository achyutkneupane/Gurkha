<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        [$unread,$read] = auth()->user()->notifications->partition(function ($notification) {
            return $notification->seen_at == null;
        });
        $notifications = collect();
        $unreadNotifications = $unread->sortByDesc('created_at');
        $readNotifications = $read->sortByDesc('seen_at');
        $notifications = $unreadNotifications->merge($readNotifications);
        return view('notifications.index', compact('notifications'));
    }
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->seen_at = now();
        $notification->save();
        return redirect()->route('notifications.index');
    }
}
