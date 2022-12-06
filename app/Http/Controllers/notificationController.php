<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function index($id){
        $notification = Notification::find($id);
        $notification->status = 'read';
        $notification->save();
        return view('backend.notifications.index' , compact('notification'));
    }
}
