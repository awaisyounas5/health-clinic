<?php

namespace App\Http\Controllers\Api\Staff\Patient;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index(){
        $patients = User::role('patient')->where('created_by', Auth::user()->created_by)->get();
        return response()->json(['status'=>true,'patients'=>$patients]);
    }
}
