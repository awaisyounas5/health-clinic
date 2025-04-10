<?php

namespace App\Http\Controllers\Api\Staff\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(){
        return response()->json(['status'=>true,'notifications'=>Auth::user()->notifications]);
    }

    public function notification_count(){
        $user = Auth::user();
        $unreadCount = $user->unreadNotifications()->count();

        return response()->json(['status' => true, 'unread_count' => $unreadCount]);
    }

    public function mark_as_read($id)
    {
        try{
        $user = auth()->user();
        $notification = $user->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json(['status'=>true,'data'=>Auth::user()->unreadNotifications]);
    }
    catch(\Exception $e){
        return response()->json(['status'=>false,'message'=>$e->getMessage()]);
    }
    }

    public function mark_as_unread($id)
{
    try {
        $user = auth()->user();
        $notification = $user->notifications()->find($id);

        if ($notification) {
            // Set the read_at attribute to null to mark as unread
            $notification->update(['read_at' => null]);
        }

        return response()->json(['status' => true, 'data' => Auth::user()->unreadNotifications]);
    } catch (\Exception $e) {
        return response()->json(['status' => false, 'message' => $e->getMessage()]);
    }
}
}
