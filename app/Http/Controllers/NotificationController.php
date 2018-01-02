<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function AllSeen(){
        foreach(auth('admin')->user()->unreadNotifications as $note){
            $note->markAsRead();
        }
    }
    public function allnotification(){
    	return view('admin.notifications.notifications');
    }
}
