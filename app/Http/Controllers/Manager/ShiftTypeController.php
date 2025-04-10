<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShiftTypeRequest;
use App\Models\ShiftType;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShiftTypeController extends Controller
{
    public function index()
    {
        $shift_types = ShiftType::where('created_by', Auth::user()->created_by)->get();
        return view('manager.shift_types.index', compact('shift_types'));
    }

    public function create()
    {
        $teams = Team::where('created_by', Auth::user()->created_by)->get();
        return view('manager.shift_types.create', compact('teams'));
    }

    public function store(ShiftTypeRequest $request)
    {

        try {
            $startTime = Carbon::createFromFormat('H:i', $request->input('start_time'));
            $endTime = Carbon::createFromFormat('H:i', $request->input('end_time'));
            $totalDuration = $endTime->diff($startTime);
            $totalTime = $totalDuration->format('%H:%I:%S');
            DB::beginTransaction();
            ShiftType::create([
                'team_id' => $request->team_id,
                'title' => $request->name,
                'created_by' => Auth::user()->created_by,
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'total_time' => $totalTime,
            ]);
            DB::commit();
            return redirect()->back()->with('success','Shift Type has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $shift_type = ShiftType::find($id);
        $teams = Team::where('created_by', Auth::user()->created_by)->get();
        return view('manager.shift_types.edit', compact('shift_type','teams'));
    }

    public function update($id, ShiftTypeRequest $request)
    {

        try {

            $startTime = Carbon::createFromFormat('H:i', $this->trimSeconds($request->input('start_time')));
            $endTime = Carbon::createFromFormat('H:i', $this->trimSeconds($request->input('end_time')));
            $totalDuration = $endTime->diff($startTime);
            $totalTime = $totalDuration->format('%H:%I:%S');
            DB::beginTransaction();
            $shift_type = ShiftType::find($id);
            $shift_update = $shift_type->update([
                'team_id' => $request->team_id,
                'title' => $request->name,
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'total_time' => $totalTime,
            ]);
            DB::commit();
            return redirect()->back()->with('success','Shift Type has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function delete($id)
    {
        try {
            $shift_type = ShiftType::find($id);
            if ($shift_type) {
                DB::beginTransaction();
                $shift_type->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Shift Type has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    function trimSeconds($time) {
        return preg_match('/^\d{2}:\d{2}:\d{2}$/', $time) ? substr($time, 0, 5) : $time;
    }
}
