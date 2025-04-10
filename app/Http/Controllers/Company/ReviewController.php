<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Notifications\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
class ReviewController extends Controller
{
    public function index(){
        $reviews=Review::all();
        return view('company.reviews.index',compact('reviews'));
    }
    public function view($id){
        $review=Review::find($id);
        return view('company.reviews.view',compact('review'));
    }

    public function change_status($id){
        try{
            $review=Review::find($id);
            DB::beginTransaction();
            $review->update([
                'status'=>'A',
            ]);

            $title="Review Acknowledged";
            $description= "Your ".ucwords($review->category)." has been Acknowledged";
            Notification::send($review->patient, new SendNotification($title,$description));
            DB::commit();
            return redirect()->back()->with('success','Status Changed notification has been sent successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
}
