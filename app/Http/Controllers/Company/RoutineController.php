<?php

namespace App\Http\Controllers\Company;

use App\Models\Routine;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoutineController extends Controller
{
    public function index()
    {

        $routines = Routine::where('created_by', Auth::user()->id)
            ->get()
            ->groupBy('patient_id');

        return view('company.routines.index', compact('routines'));
    }

    public function create()
    {
        $patients = User::role('patient')->where('created_by', Auth::id())->get();
        return view('company.routines.create', compact('patients'));
    }


    public function view($patientId)
    {
        $routines = Routine::where('patient_id', $patientId)->get();
        return view('company.routines.view_by_patient', compact('routines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'time' => 'required|date_format:H:i',
        ]);

        try {
            DB::beginTransaction();
            Routine::create([
                'patient_id' => $request->patient_id,
                'description' => $request->description,
                'time' => $request->time,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            return redirect()->route('company.routines')->with('success', 'Routine activity has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $routine = Routine::find($id);
        $patients = User::role('patient')->where('created_by', Auth::id())->get();
        return view('company.routines.edit', compact('routine', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'time' => 'required',
        ], [
            'patient_id.required' => 'Please select a patient.',
            'patient_id.exists' => 'The selected patient does not exist.',
            'description.required' => 'Please enter the activity details.',
            'description.string' => 'The activity details must be a string.',
            'time.required' => 'Please enter the activity time.',
        ]);

        try {
            DB::beginTransaction();
            $routine = Routine::find($id);
            $routine->update([
                'patient_id' => $request->patient_id,
                'description' => $request->description,
                'time' => $request->time,
            ]);
            DB::commit();
            return redirect()->route('company.routines')->with('success', 'Routine activity has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }


    public function destroy($id)
    {
        try {
            $routine = Routine::find($id);
            if ($routine) {
                DB::beginTransaction();
                $routine->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Routine activity has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
