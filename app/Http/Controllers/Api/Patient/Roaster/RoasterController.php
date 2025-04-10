<?php

namespace App\Http\Controllers\Api\Patient\Roaster;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoasterController extends Controller
{
    public function index(Request $request){
        $shift = Shift::with(['staff','patient'])->where('patient_id', Auth::user()->id)->get();

        return response()->json(['status'=>true,'shift'=>$shift]);
    }
}
