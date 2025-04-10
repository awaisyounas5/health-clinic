<?php

namespace App\Http\Controllers\Company;

use App\Models\Appointment;
use App\Models\Team;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('created_by', Auth::user()->id)->get();
        return view('company.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $teams = Team::where('created_by', Auth::id())->get();
        $staff = [];
        $patients = User::role('patient')->where('created_by', Auth::id())->get();
        return view('company.appointments.create', compact('teams', 'staff', 'patients'));
    }

    public function getStaffByTeam(Request $request)
    {

        $staff = User::role('staff_member')->whereHas('team', function ($q) use ($request) {
            $q->where('id', $request->team_id);
        })->select('users.id', 'users.name')->get();


        return response()->json($staff);
    }

    public function store(AppointmentRequest $request)
    {

        try {
            DB::beginTransaction();
            Appointment::create([
                'team_id'=>$request->team_id,
                'staff_id' => $request->staff_id,
                'patient_id' => $request->patient_id,
                'date' => $request->date,
                'time' => $request->time,
                'details' => $request->details,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            return redirect()->route('company.appointments')->with('success','Appointment has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $teams = Team::where('created_by', Auth::id())->get();
        $staff = [];
        $patients = User::role('patient')->where('created_by', Auth::id())->get();
        return view('company.appointments.edit', compact('appointment', 'teams', 'staff', 'patients'));
    }

    public function update(AppointmentRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $appointment = Appointment::find($id);
            $appointment->update([
                'team_id'=>$request->team_id,
                'staff_id' => $request->staff_id,
                'patient_id' => $request->patient_id,
                'date' => $request->date,
                'time' => $request->time,
                'details' => $request->details,
            ]);
            DB::commit();
            return redirect()->route('company.appointments')->with('success','Appointment has been updated successfully');;
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $appointment = Appointment::find($id);
            if ($appointment) {
                DB::beginTransaction();
                $appointment->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Appointment has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
