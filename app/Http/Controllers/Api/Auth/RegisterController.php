<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        try{
            DB::beginTransaction();
            $company=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ])->assignRole('staff');
            DB::commit();
            $token=$company->createToken($request->email)->plainTextToken;
            $role = $company->roles->first()->name;
            return response()->json(['status'=>true,'User'=>$company,'role'=>$role,'token'=>$token],JsonResponse::HTTP_OK);

        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>false,'message'=>$e->getMessage()],JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
