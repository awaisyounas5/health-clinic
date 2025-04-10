<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncidentController extends Controller
{
    public function view_report(){
        $incident_reports = Incident::where('created_by', Auth::user()->id)->get();
        return view('staff.incidents.view-reports', compact('incident_reports'));
    }


    public function create_report(){
        return view('staff.incidents.create-report');
    }

    public function store_report(Request $request)
    {
        try {
            DB::beginTransaction();
            Incident::create([
                'incident_date' => $request->date,
                'incident_time' => $request->time,
                'incident_people' => $request->people_involved,
                'position_of_reporter' => $request->position_of_reporter,
                'location' => $request->location,
                'name_of_reporter' => $request->name_of_reporter,
                'incident_details' => $request->incident_details,
                'severity_incident' => $request->severity_of_incidents,
                'type_of_incident' => $request->type_of_incidents,
                'possible_trigger' => $request->possible_trigger,
                'recommendation' => $request->recommendations,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Incident report has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
