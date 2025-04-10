<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use App\Models\ShiftTask;
use App\Models\ShiftType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function index(){
        $shift_notes = Shift::where('status','complete')->get();


        $staff_members = $shift_notes->pluck('staff_id')->toArray();

        $unique_staff_members = array_unique($staff_members);

        $filtered_shifts = [];
        foreach ($unique_staff_members as $staff_member) {
            $filtered_shifts[] = $shift_notes->where('staff_id', $staff_member)->first();
        }

        $shift_notes = $filtered_shifts;

        return view('company.finance.index', compact('shift_notes'));
    }
    public function view_by_staff($id) {
        $shift_notes = Shift::join('shift_types as st', 'shifts.shift_type_id', '=', 'st.id')
        ->join('pay_rates as pr', 'shifts.payrate_id', '=', 'pr.id')
        ->select(
            'shifts.staff_id',
            DB::raw('WEEK(shifts.start_date) AS week_number'),
            DB::raw('YEAR(shifts.start_date) AS year'),
            DB::raw('SUM(st.total_time * pr.amount) AS weekly_salary')
        )
        ->where('shifts.staff_id',$id)
        ->groupBy('shifts.staff_id', DB::raw('WEEK(shifts.start_date)'), DB::raw('YEAR(shifts.start_date)'))
        ->orderBy('shifts.staff_id')
        ->orderBy(DB::raw('YEAR(shifts.start_date)'))
        ->orderBy(DB::raw('WEEK(shifts.start_date)'))
        ->get();

        return view('company.finance.view_by_staff', compact('shift_notes'));
    }
    public function view_staff($id){
        $finances = ShiftTask::with('shift')->where('shift_id',$id)->get();

        return view('company.note.view_by_shift', compact('finances'));
    }
}
