<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    use ImageUpload;
    public function view(){
        return view('manager.account_setting.view_profile');
    }

    public function edit(){
        return view('manager.account_setting.edit_profile');
    }
    public function change_password(){
        return view('manager.account_setting.settings');
    }

    public function update_password(Request $request){
        $request->validate([
            'current_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);
        try{
            $user=User::find(Auth::id());
            if($user && Hash::check($request->current_password,$user->password)){
                DB::beginTransaction();
                $user->update([
                    'password'=>Hash::make($request->new_password),
                ]);
                DB::commit();
                return redirect()->back()->with('success','Your password has been changed successfully');
            }else{
                return redirect()->back()->with('error','Your current password is invalid');
            }
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>true,'message'=>$e->getMessage()]);
        }
    }


    public function update(Request $request)
    {
        if($request->hasFile('photo')){
            $file_name=$this->imageUpload($request->photo);
        }
        try {
            DB::beginTransaction();

            $profile_update = Auth::user()->update([
                'name' => $request->first_name,
                'email' => $request->email,
                'created_by' => Auth::user()->id,
                'surname' => $request->sur_name,
                'prefered_name' => $request->preffered_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'bio' => $request->bio,
                'date_of_birth' => $request->date_of_birth,
                'photo' => $file_name ?? null,
            ]);
            DB::commit();
            return redirect()->back()->with('success','Profile has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
