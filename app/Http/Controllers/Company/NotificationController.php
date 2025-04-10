<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Models\User;
use App\Notifications\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function index(){
        return view('company.notifications.index');
    }
    public function create(){
        return view('company.notifications.create');
    }
    public function send_notifications(NotificationRequest $request)
    {

        try{
            if($request->user_type=="Everyone"){
                $users = User::where('created_by',Auth::id())->get();
                Notification::send($users, new SendNotification($request->title,$request->description));

            }
            if($request->user_type=="Staff"){
                $users = User::role('staff_member')->where('created_by',Auth::id())->get();
                Notification::send($users, new SendNotification($request->title,$request->description));

            }
            if($request->user_type=="Patients"){
                $users = User::role('patient')->where('created_by',Auth::id())->get();
                Notification::send($users, new SendNotification($request->title,$request->description));

            }
            if($request->user_type=="Manager"){
                $users = User::role('manager')->where('created_by',Auth::id())->get();
                Notification::send($users, new SendNotification($request->title,$request->description));

            }
            return redirect()->back()->with('success','Notification has been send successfully');
        }
        catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }


    public function delete($id)
    {
        try{
            $user = auth()->user();
            $notification = $user->notifications()->findOrFail($id);

            if ($notification) {
                $notification->delete();
            }

            return response()->json(['status' => true,'message'=>'Notification has been deleted successfully']);

        }
        catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function markAsRead($id)
    {
        try{
        $user = auth()->user();
        $notification = $user->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json(['status'=>true,'message'=>'Notification has been read successfully']);
    }
    catch(\Exception $e){
        return response()->json(['status'=>false,'message'=>$e->getMessage()]);
    }
    }
}
