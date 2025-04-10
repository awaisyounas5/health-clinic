<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public  function login(Request $request){
        try{
            $company=User::where('email',$request->email)->first();

            if($company){
            if(Hash::check($request->password,$company->password) )
            {
                $token=$company->createToken($request->email)->plainTextToken;
                $role = $company->roles->first()->name;
                return response()->json(['status'=>true,'User'=>$company,'role'=>$role,'token'=>$token],JsonResponse::HTTP_OK);
            }
            else{
                return response()->json(['status'=>false,'message'=>'Invalid credential...'],JsonResponse::HTTP_NOT_FOUND);
            }
        }
        else{
            return response()->json(['status'=>false,'message'=>'Invalid credential...'],JsonResponse::HTTP_NOT_FOUND);
        }
        }
        catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()],JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
