<?php

namespace App\Http\Controllers\Api\Patient\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{

    public function index(){
        $teams=Team::where('created_by', Auth::user()->created_by)->get();
        return response()->json(['status'=>true,'Teams'=>$teams]);
    }


    public function store(Request $request){
        try{
            DB::beginTransaction();
            $team=Team::create([
                'title'=>$request->title,
                'created_by'=>Auth::user()->id,
            ]);
            DB::commit();
            return response()->json(['status'=>true,'Team'=>$team]);

        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }


    public function update($id,Request $request){
        try{
            DB::beginTransaction();
            $team=Team::find($id);
            $team_update=$team->update([
                'title'=>$request->title,
            ]);
            DB::commit();

            return response()->json(['status'=>true,'Team Updated'=>$team]);

        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }


    public function delete($id){
        try{
            $team=Team::find($id);
            if($team){
                DB::beginTransaction();
                $team->delete();
                DB::commit();
            }
            return response()->json(['status'=>true,'message'=>'Team has been deleted successfully']);

        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
}
