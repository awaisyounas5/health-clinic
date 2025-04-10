<?php

namespace App\Http\Controllers\Api\Patient\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    use ImageUpload;
    public function user_details()
    {

      return response()->json(['success' => true, 'data' => Auth::user()], 200);

    }

    public function update_profile(Request $request){
        try{
            DB::beginTransaction();
            $profile_update = Auth::user()->update([
                'name' => $request->first_name,
                'email' => $request->email,
                'surname' => $request->sur_name,
                'prefered_name' => $request->preffered_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'bio' => $request->bio,
                'date_of_birth' => $request->date_of_birth,
            ]);
            DB::commit();
            return response()->json(['status'=>true,'Updated Profile Detail'=>Auth::user()]);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function picture_update(Request $request){
        try{
            if($request->hasFile('photo')){
                $file_name=$this->imageUpload($request->photo);
            }
            DB::beginTransaction();
            $profile_picture=Auth::user()->update([
                'photo' => $file_name ?? Auth::user()->photo,
            ]);
            DB::commit();
            return response()->json(['status'=>true,'User Picture'=>Auth::user()->photo]);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }


}
