<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use App\Models\ShiftType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoasterController extends Controller
{
    public function events(Request $request)
    {
        try {

            $shift = Shift::where('staff_id', Auth::user()->id)->get();
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
                ];
            });


            return response()->json(['events' => $events]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

}
