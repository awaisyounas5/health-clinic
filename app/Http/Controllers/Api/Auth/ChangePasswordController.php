<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
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
                return response()->json(['status'=>true,'message'=>'Your password has been changed successfully']);
            }else{
                return response()->json(['error'=>'Your current password is invalid']);
            }
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
}
