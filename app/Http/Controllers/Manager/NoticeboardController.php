<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\Noticeboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticeboardController extends Controller
{
    public function index(){
        $notices = Noticeboard::where('created_by', Auth::user()->created_by)->get();
        return view('manager.noticeboards.index', compact('notices'));
    }

    public function create(){
        return view('manager.noticeboards.create');
    }

    public function store(NoticeRequest $request){

        try{
            DB::beginTransaction();
            Noticeboard::create([
                'title' => $request->title,
                'description' => $request->description,
                'created_by' => Auth::user()->created_by,
            ]);
            DB::commit();
            return redirect()->route('manager.noticeboard')->with('success','Notice has been created successfully');
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit($id){
        $notice = Noticeboard::find($id);
        return view('manager.noticeboards.edit', compact('notice'));
    }

    public function update(NoticeRequest $request, $id){

        try{
            DB::beginTransaction();
            $notice = Noticeboard::find($id);
            $notice->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            DB::commit();
            return redirect()->route('manager.noticeboard')->with('success','Notice has been udpated successfully');
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function delete($id){
        try{
            $notice = Noticeboard::find($id);
            if($notice){
                DB::beginTransaction();
                $notice->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Notice has been deleted successfully']);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
