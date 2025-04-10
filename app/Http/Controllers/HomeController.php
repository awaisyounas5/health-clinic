<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Audit;
use App\Models\Review;
use App\Models\Shift;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','check_status']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teams=Team::where('created_by',Auth::user()->id)->count();
        $staffs=User::role('staff_member')->where('created_by',Auth::user()->id)->count();
        $patients=User::role('patient')->where('created_by',Auth::user()->id)->count();
        $appointments=Appointment::count();
        $company_appointments=Appointment::where('created_by',Auth::user()->id)->get();
        $audits=Audit::where('created_by',Auth::user()->id)->take(5)->get();
        $total_complaints=Review::where('category','complaint')->count();
        $total_compliment=Review::where('category','compliment')->count();
        $total_suggestion=Review::where('category','suggestion')->count();
        $patient_today_shifts=Shift::where('patient_id',Auth::user()->id)->whereDate('start_date', Carbon::today())->count();
        $patient_today_appointment=Appointment::where('patient_id',Auth::user()->id)->whereBetween('date', [Carbon::today()->startOfDay(), Carbon::today()->endOfDay()])->count();
        $patient_upcomming_appointment=Appointment::where('patient_id',Auth::user()->id)->where('date', '>', Carbon::today()->endOfDay())->count();
        $staff_today_shifts=Shift::where('staff_id',Auth::user()->id)->whereDate('start_date', Carbon::today())->count();
        $staff_today_appointment=Appointment::where('staff_id',Auth::user()->id)->whereBetween('date', [Carbon::today()->startOfDay(), Carbon::today()->endOfDay()])->count();
        $staff_upcomming_appointment=Appointment::where('staff_id',Auth::user()->id)->where('date', '>', Carbon::today()->endOfDay())->count();
        return view('company.dashboard',compact('teams','staffs','patients','appointments','company_appointments','audits','total_complaints','total_compliment','total_suggestion','patient_today_appointment','patient_today_shifts','patient_upcomming_appointment','staff_today_appointment','staff_today_shifts','staff_upcomming_appointment'));
    }
}
