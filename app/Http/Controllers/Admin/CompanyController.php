<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index(){
        $companies =User::role('company')->get();
        return view('admin.company.index',compact('companies'));
    }


    public function statusChanger($id,Request $request){
        try{
            $user=User::find($id);

            DB::beginTransaction();
            $user_status=$user->update([
                'status'=>$request->status,
            ]);
            if($request->status=='expired'){
                User::where('created_by',$id)->update([
                    'status'=>$request->status,
                ]);
            }

            DB::commit();
            return response()->json(['status'=>true,'message'=>'Status has been change successfully']);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
}
