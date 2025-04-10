<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{

    public function index(){
        $teams=Team::where('created_by',Auth::id())->get();
        return view('company.teams.index',compact('teams'));
    }
    public function create(){
        return view('company.teams.create');
    }

    public function store(TeamRequest $request){

        try{
            DB::beginTransaction();
            Team::create([
                'title'=>$request->name,
                'created_by'=>Auth::user()->id,
            ]);
            DB::commit();
            return redirect()->back()->with('success','Team has been created successfully');

        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }


    public function edit($id){
        $team=Team::find($id);
        return view('company.teams.edit',compact('team'));
    }

    public function update($id,TeamUpdateRequest $request){

        try{
            DB::beginTransaction();
            $team=Team::find($id);
            $team_update=$team->update([
                'title'=>$request->name,
            ]);
            DB::commit();
            return redirect()->back()->with('success','Team has been updated successfully');

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
