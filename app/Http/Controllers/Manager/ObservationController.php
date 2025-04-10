<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ObservationRequest;
use App\Models\Observeration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ObservationController extends Controller
{
    public function index()
    {
        $observations = Observeration::where('created_by', Auth::user()->created_by)
            ->get()
            ->groupBy('patient_id');

        return view('manager.observations.index', compact('observations'));
    }

    public function create()
    {
        $patients = User::role('patient')->where('created_by', Auth::user()->created_by)->get();
        return view('manager.observations.create', compact('patients'));
    }


    public function view($patientId)
    {
        $observations = Observeration::where('patient_id', $patientId)->get();
        return view('manager.observations.view_by_patient', compact('observations'));
    }

    public function store(ObservationRequest $request)
    {

        try {

            Observeration::create([
                'patient_id' => $request->patient_id,
                'respiratory_rate' => $request->respiratory_rate,
                'body_temperature' => $request->body_temperature,
                'spo2_level' => $request->spo2_level,
                'inspired_o2' => $request->inspired_o2,
                'blood_pressure_level' => $request->blood_pressure_level,
                'heart_beat_rate' => $request->heart_beat_rate,
                'concious_level' => $request->concious_level,
                'additional_notes' => $request->additional_notes,
                'created_by' => Auth::user()->created_by,
            ]);

            return redirect()->route('manager.observation')->with('success', 'Observation activity has been created successfully');
        } catch (\Exception $e) {

            DB::rollback();
            return redirect()->back()->withInput()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $observation = Observeration::findOrFail($id);
        $patients = User::role('patient')->where('created_by', Auth::user()->created_by)->get();
        return view('manager.observations.edit', compact('observation','patients'));
    }

    public function update(ObservationRequest $request, $id)
    {

        try {
            DB::beginTransaction();
            $observation = Observeration::findOrFail($id);
            $observation->update([
                'patient_id' => $request->patient_id,
                'respiratory_rate' => $request->respiratory_rate,
                'body_temperature' => $request->body_temperature,
                'spo2_level' => $request->spo2_level,
                'inspired_o2' => $request->inspired_o2,
                'blood_pressure_level' => $request->blood_pressure_level,
                'heart_beat_rate' => $request->heart_beat_rate,
                'concious_level' => $request->concious_level,
                'additional_notes' => $request->additional_notes,
            ]);
            DB::commit();
            return redirect()->route('manager.observation')->with('success', 'Observation activity has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $observation = Observeration::findOrFail($id);
            $observation->delete();
            DB::commit();
            return response()->json(['status'=>true, 'message'=>'Observation activity has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
