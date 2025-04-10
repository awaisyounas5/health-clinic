<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoasterRequest;
use App\Models\PayRate;
use App\Models\Shift;
use App\Models\ShiftType;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoasterController extends Controller
{
    public function index()
    {
        $teams = Team::where('created_by', Auth::user()->created_by)->get();
        $patients = User::role('patient')->where('created_by', Auth::user()->created_by)->get();
        return view('manager.roaster.roaster', compact('teams', 'patients'));
    }

    public function events(Request $request)
    {
        try {


            $staffs = User::role('staff_member')
                ->where('team_id', $request->filter)
                ->where('created_by', Auth::user()->created_by)->get();

            $shift_types = ShiftType::where('team_id', $request->filter)->where('created_by', Auth::user()->created_by)->get();
            $html = view('ajax.staff_member', compact('staffs'))->render();
            $team_shift = view('ajax.shift_type', compact('shift_types'))->render();

            $shift = Shift::where('team_id', $request->filter)->where('created_by', Auth::user()->created_by)->get();
            $events = $shift->map(function ($shift) {
                return [
                    'id'    => $shift->id,
                    'team_id' => $shift->team_id,
                    'staff_id' => $shift->staff_id,
                    'patient_id' => $shift->patient_id,
                    'status' => $shift->status,
                    'title' =>  $shift->staff->name . '-' . $shift->patient->name . '(' . $shift->status . ')',
                    'start' => $shift->start_date,
                    'end' => $shift->end_date,
                    'backgroundColor' => $shift->background_color,
                    'extra_info' => $shift->extra_shift_info,
                    'payrate_id' => $shift->payrate_id,
                    'shift_type_id' => $shift->shift_type_id,
                    'end_date'=>$shift->end_date,
                ];
            });


            return response()->json(['events' => $events, 'staff_member' => $html, 'team_shift' => $team_shift]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function pay_rates(Request $request)
    {
        try {
            $payrates = PayRate::where('staff_id', $request->staff_member)->where('created_by', Auth::user()->created_by)->get();
            $pay_rate = view('ajax.payrate', compact('payrates'))->render();
            return response()->json(['pay_rates' => $pay_rate]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function event_edit(RoasterRequest $request, $id)
    {

        try {

            DB::beginTransaction();
            $shift = Shift::where('id', $id)->where('created_by', Auth::user()->created_by)->update([
                'team_id' => $request->team_id,
                'patient_id' => $request->patient_id,
                'staff_id' => $request->staff_id,
                'payrate_id' => $request->payrate_id,
                'shift_type_id' => $request->shift_type_id,
                'created_by' => Auth::user()->created_by,
                'background_color' => $request->background_color,
                'start_date' => $request->start_date,
                'end_date' => $request->end_time,
                'status' => $request->status,
                'extra_shift_info' => $request->extra_shift_info,
            ]);
            DB::commit();
            $shift = Shift::where('team_id', $request->team_id)->where('created_by', Auth::user()->created_by)->get();
            $events = $shift->map(function ($shift) {
                return [
                    'id'    => $shift->id,
                    'team_id' => $shift->team_id,
                    'staff_id' => $shift->staff_id,
                    'patient_id' => $shift->patient_id,
                    'status' => $shift->status,
                    'title' =>  $shift->staff->name . '-' . $shift->patient->name . '(' . $shift->status . ')',
                    'start' => $shift->start_date,
                    'end' => $shift->end_date,
                    'backgroundColor' => $shift->background_color,
                    'extra_info' => $shift->extra_shift_info,
                    'payrate_id' => $shift->payrate_id,
                    'shift_type_id' => $shift->shift_type_id,
                    'end_date'=>$shift->end_date,
                ];
            });

            return response()->json(['events' => $events, 'message' => "Shift has been updated successfully"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function event_store(RoasterRequest $request)
    {

        try {

            DB::beginTransaction();
            $shift = Shift::create([
                'team_id' => $request->team_id,
                'patient_id' => $request->patient_id,
                'staff_id' => $request->staff_id,
                'payrate_id' => $request->payrate_id,
                'shift_type_id' => $request->shift_type_id,
                'created_by' => Auth::user()->created_by,
                'background_color' => $request->background_color,
                'start_date' => $request->start_date,
                'end_date' => $request->end_time,
                'status' => $request->status,
                'extra_shift_info' => $request->extra_shift_info,
            ]);
            DB::commit();
            $shift = Shift::where('team_id', $request->team_id)->where('created_by', Auth::user()->created_by)->get();
            $events = $shift->map(function ($shift) {
                return [
                    'id'    => $shift->id,
                    'team_id' => $shift->team_id,
                    'staff_id' => $shift->staff_id,
                    'patient_id' => $shift->patient_id,
                    'status' => $shift->status,
                    'title' =>  $shift->staff->name . '-' . $shift->patient->name . '(' . $shift->status . ')',
                    'start' => $shift->start_date,
                    'end' => $shift->end_date,
                    'backgroundColor' => $shift->background_color,
                    'extra_info' => $shift->extra_shift_info,
                    'payrate_id' => $shift->payrate_id,
                    'shift_type_id' => $shift->shift_type_id,
                    'end_date'=>$shift->end_date,

                ];
            });

            return response()->json(['events' => $events, 'message' => "Shift has been created successfully"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function delete($id)
    {
        try {
            $shift = Shift::where('id', $id)->where('created_by', Auth::user()->created_by)->first();
            if ($shift) {
                $shift->delete();
            }

            return response()->json(['status' => true, 'message' => "Shift has been deleted successfully"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function publish_events($id)
    {
        try {

            Shift::where('team_id', $id)->where('created_by', Auth::user()->created_by)->update([
                'status' => 'A',
            ]);

            $shift = Shift::where('team_id', $id)->where('created_by', Auth::user()->created_by)->get();
            $events = $shift->map(function ($shift) {
                return [
                    'id'    => $shift->id,
                    'team_id' => $shift->team_id,
                    'staff_id' => $shift->staff_id,
                    'patient_id' => $shift->patient_id,
                    'status' => $shift->status,
                    'title' =>  $shift->staff->name . '-' . $shift->patient->name . '(' . $shift->status . ')',
                    'start' => $shift->start_date,
                    'end' => $shift->end_date,
                    'backgroundColor' => $shift->background_color,
                    'extra_info' => $shift->extra_shift_info,
                    'payrate_id' => $shift->payrate_id,
                    'shift_type_id' => $shift->shift_type_id,
                    'end_date'=>$shift->end_date,
                ];
            });

            return response()->json(['events' => $events, 'message' => "Shift status has been updated successfully"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}

