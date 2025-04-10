<?php

namespace App\Http\Controllers\Api\Patient\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(){
        $appointments = Appointment::with(['staff','patient'])->where('patient_id', Auth::user()->id)->get();
        return response()->json(['status'=>true,'appointments'=>$appointments]);
    }
}
