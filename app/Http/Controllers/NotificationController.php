<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getUnreadCount(){
        $count = (auth()->user()->unreadNotifications)->count();
        return @$count;
    }
    public function show(){
        if(auth()->user()) {
        $notification = tap(auth()->user()->unreadNotifications)->markAsRead();

            return view('notifications.showNotifications', compact('notification'));
        }
    }
}
