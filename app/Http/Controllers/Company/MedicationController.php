<?php

namespace App\Http\Controllers\Company;

use App\Models\Medication;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\MedicineRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MedicationController extends Controller
{
    public function index()
    {
        $medications = Medication::where('created_by', Auth::id())
            ->get()
            ->groupBy('patient_id');

        return view('company.medications.index', compact('medications'));
    }

    public function create()
    {
        $patients = User::role('patient')->where('created_by', Auth::id())->get();
        return view('company.medications.create', compact('patients'));
    }


    public function view($patientId)
    {
        $medications = Medication::where('patient_id', $patientId)->get();
        return view('company.medications.view_by_patient', compact('medications'));
    }

    public function store(MedicineRequest $request)
    {

        try {
            DB::beginTransaction();
            Medication::create([
                'patient_id' => $request->patient_id,
                'name' => $request->name,
                'dose' => $request->dose,
                'amount' => $request->amount,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'notes' => $request->notes,
                'created_by' => Auth::id(),
            ]);
            DB::commit();
            return redirect()->route('company.medications')->with('success', 'Medication activity has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $medications = Medication::findOrFail($id);
        $patients = User::role('patient')->where('created_by', Auth::id())->get();
        return view('company.medications.edit', compact('medications','patients'));
    }

    public function update(MedicineRequest $request, $id)
    {

        try {
            DB::beginTransaction();
            $medication = Medication::findOrFail($id);
            $medication->update([
                'patient_id' => $request->patient_id,
                'name' => $request->name,
                'dose' => $request->dose,
                'amount' => $request->amount,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'notes' => $request->notes,
            ]);
            DB::commit();
            return redirect()->route('company.medications')->with('success', 'Medication activity has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $medication = Medication::findOrFail($id);
            $medication->delete();
            DB::commit();
            return response()->json(['status'=>true, 'message'=>'Medication activity has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
