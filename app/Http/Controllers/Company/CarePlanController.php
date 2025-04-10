<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Medication;
use App\Models\Observeration;
use App\Models\Routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarePlanController extends Controller
{
    public function index()
    {
        $careplans = Medication::where('created_by', Auth::id())
            ->get()
            ->groupBy('patient_id');

        return view('company.careplan.index', compact('careplans'));
    }


    public function view($id){
        $patient_detail=User::role('patient')->find($id);
        $medications = Medication::where('patient_id', $id)->get();
        $routines = Routine::where('patient_id', $id)->get();
        $observations = Observeration::where('patient_id', $id)->get();
        return view('company.careplan.view_by_patient',compact('patient_detail','medications','routines','observations'));
    }
}
