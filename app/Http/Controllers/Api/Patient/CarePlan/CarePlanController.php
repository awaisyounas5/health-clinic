<?php

namespace App\Http\Controllers\Api\Patient\CarePlan;

use App\Http\Controllers\Controller;
use App\Models\Medication;
use App\Models\Observeration;
use App\Models\Routine;
use App\Models\User;
use Illuminate\Http\Request;

class CarePlanController extends Controller
{
    public function index($id){
        $patient_detail=User::role('patient')->find($id);
        $medications = Medication::where('patient_id', $id)->get();
        $routines = Routine::where('patient_id', $id)->get();
        $observations = Observeration::where('patient_id', $id)->get();
        return response()->json(['status'=>true,'patient_detail'=>$patient_detail,'medications'=>$medications,'routines'=>$routines,'observations'=>$observations]);
    }
}
