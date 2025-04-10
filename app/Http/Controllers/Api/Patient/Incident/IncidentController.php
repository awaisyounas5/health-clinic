<?php

namespace App\Http\Controllers\Api\Patient\Incident;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Incident;
use App\Models\Investigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncidentController extends Controller
{
    public function index()
    {
        $incident_reports = Incident::where('created_by', Auth::user()->created_by)->get();
        return response()->json(['status'=>true,'incident_reports'=>$incident_reports]);
    }
    public function incident_details($id)
    {
        $report = Incident::where('id',$id)->first();
        $investigation = Investigation::where('incident_id',$id)->first();
        $action = Action::where('investigation_id',$investigation->id)->first();
        return response()->json(['status'=>true,'incident_reports'=>$report,'investigation'=>$investigation,'action'=>$action]);
    }



    public function store(Request $request){
        try {
            DB::beginTransaction();
            $incident=Incident::create([
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
            return response()->json(['status'=>true,'Incident Data'=>$incident]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
