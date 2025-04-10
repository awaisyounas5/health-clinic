<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetencyController extends Controller
{
    public function competency_pass()
    {
        return view('manager.competencies.passed');
    }

    public function get_passed_data()
    {
        $currentYear = Carbon::now()->year;


        $audits = Audit::where('created_by', Auth::user()->created_by)
            ->whereYear('created_at', $currentYear)
            ->get();

        $audit_passed_data = $audits->filter(function ($audit) {
            $competency_percentage = (int) rtrim($audit->completed, '%');
            return $competency_percentage > 80;
        })->map(function ($audit) {
            return [
                'start_date' => $audit->created_at->format('Y-m-d'),
                'competency_percentage' => (int) rtrim($audit->completed, '%'),
                'audit_name' => $audit->name,
                'audit_location' => $audit->location,
            ];
        })->values()->toArray();

        return response()->json(['status' => true, 'audit_passed_data' => $audit_passed_data]);
    }


    public function competency_improvement(){

        return view('manager.competencies.room_for_improvement');
    }
    public function get_improvement_data()
    {
        $currentYear = Carbon::now()->year;


        $audits = Audit::where('created_by', Auth::user()->created_by)
            ->whereYear('created_at', $currentYear)
            ->get();

        $audit_passed_data = $audits->filter(function ($audit) {
            $competency_percentage = (int) rtrim($audit->completed, '%');
            return $competency_percentage > 40 && $competency_percentage < 80;
        })->map(function ($audit) {
            return [
                'start_date' => $audit->created_at->format('Y-m-d'),
                'competency_percentage' => (int) rtrim($audit->completed, '%'),
                'audit_name' => $audit->name,
                'audit_location' => $audit->location,
            ];
        })->values()->toArray();

        return response()->json(['status' => true, 'audit_passed_data' => $audit_passed_data]);
    }


    public function competency_failed(){
        return view('manager.competencies.failed');
    }
    public function get_failed_data()
    {
        $currentYear = Carbon::now()->year;


        $audits = Audit::where('created_by', Auth::user()->created_by)
            ->whereYear('created_at', $currentYear)
            ->get();

        $audit_passed_data = $audits->filter(function ($audit) {
            $competency_percentage = (int) rtrim($audit->completed, '%');
            return $competency_percentage < 40;
        })->map(function ($audit) {
            return [
                'start_date' => $audit->created_at->format('Y-m-d'),
                'competency_percentage' => (int) rtrim($audit->completed, '%'),
                'audit_name' => $audit->name,
                'audit_location' => $audit->location,
            ];
        })->values()->toArray();

        return response()->json(['status' => true, 'audit_passed_data' => $audit_passed_data]);
    }
}

