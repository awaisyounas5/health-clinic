<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActionRequest;
use App\Http\Requests\IncidentRequest;
use App\Http\Requests\InvestigationRequest;
use App\Models\Action;
use App\Models\ActionPlan;
use App\Models\Incident;
use App\Models\IncidentType;
use App\Models\Investigation;
use App\Models\Position;
use App\Models\Recommendation;
use App\Models\Result;
use App\Models\Trigger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncidentController extends Controller
{

    public function view_report()
    {
        $incident_reports = Incident::where('created_by', Auth::user()->id)->get();
        return view('company.incidents.view-reports', compact('incident_reports'));
    }

    public function create_report()
    {
        $positions = Position::where('created_by', Auth::user()->id)->get();
        $recommendations = Recommendation::where('created_by', Auth::user()->id)->get();
        $incident_types = IncidentType::where('created_by', Auth::user()->id)->get();
        $triggers = Trigger::where('created_by', Auth::user()->id)->get();
        return view('company.incidents.create-report', compact('positions', 'recommendations', 'incident_types', 'triggers'));
    }



    public function store_report(IncidentRequest $request)
    {

        try {
            DB::beginTransaction();
            Incident::create([
                'incident_date' => $request->date,
                'incident_time' => $request->time,
                'incident_people' => $request->people_involved,
                'position_of_reporter' => $request->position,
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

    public function edit_report($id)
    {
        $report = Incident::findOrFail($id);
        return view('company.incidents.edit-report', compact('report'));
    }

    public function update_report(IncidentRequest $request, $id)
    {
        try {
            $report = Incident::findOrFail($id);
            $report->update([
                'incident_date' => $request->date,
                'incident_time' => $request->time,
                'incident_people' => $request->people_involved,
                'position_of_reporter' => $request->position,
                'location' => $request->location,
                'name_of_reporter' => $request->name_of_reporter,
                'incident_details' => $request->incident_details,
                'severity_incident' => $request->severity_of_incidents,
                'type_of_incident' => $request->type_of_incidents,
                'possible_trigger' => $request->possible_trigger,
                'recommendation' => $request->recommendations,
            ]);
            return redirect()->route('company.incidents.view_reports')->with('success', 'Incident Report has been updated successfully');
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function view_incident_report($id)
    {
        $report = Incident::findOrFail($id);
        return view('company.incidents.view-report', compact('report'));
    }


    public function view_investigation()
    {
        $investigation_reports = Investigation::where('created_by', Auth::user()->id)->get();
        return view('company.incidents.view-investigations', compact('investigation_reports'));
    }

    public function create_investigation($id)
    {
        $positions = Position::where('created_by', Auth::user()->id)->get();
        $recommendations = Recommendation::where('created_by', Auth::user()->id)->get();
        $staffs = User::role('staff_member')->where('created_by', Auth::user()->id)->get();
        $results = Result::where('created_by', Auth::user()->id)->get();
        $action_plans = ActionPlan::where('created_by', Auth::user()->id)->get();
        return view('company.incidents.create-investigation', compact('id', 'staffs', 'positions', 'recommendations', 'results', 'action_plans'));
    }

    public function store_position(Request $request)
    {

        try {
            DB::beginTransaction();
            Position::create([
                'title' => $request->newPosition,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            $positions = Position::where('created_by', Auth::user()->id)->get();
            $html = view('ajax.position', compact('positions'))->render();
            return response()->json(['status' => true, 'message' => 'Position has been added successfully', 'position' => $html]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function store_recommendation(Request $request)
    {

        try {
            DB::beginTransaction();
            Recommendation::create([
                'title' => $request->newRecommendation,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            $recommendations = Recommendation::where('created_by', Auth::user()->id)->get();
            $html = view('ajax.recommendation', compact('recommendations'))->render();
            return response()->json(['status' => true, 'message' => 'Recommendation has been added successfully', 'recommendations' => $html]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function store_trigger(Request $request)
    {

        try {
            DB::beginTransaction();
            Trigger::create([
                'title' => $request->newTrigger,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            $triggers = Trigger::where('created_by', Auth::user()->id)->get();
            $html = view('ajax.trigger', compact('triggers'))->render();
            return response()->json(['status' => true, 'message' => 'Trigger has been added successfully', 'triggers' => $html]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function store_incident_type(Request $request)
    {

        try {
            DB::beginTransaction();
            IncidentType::create([
                'title' => $request->newType,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            $incident_types = IncidentType::where('created_by', Auth::user()->id)->get();
            $html = view('ajax.incident_type', compact('incident_types'))->render();
            return response()->json(['status' => true, 'message' => 'Incident Type has been added successfully', 'incident_types' => $html]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function store_result(Request $request)
    {

        try {
            DB::beginTransaction();
            Result::create([
                'title' => $request->newResult,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            $results = Result::where('created_by', Auth::user()->id)->get();
            $html = view('ajax.result', compact('results'))->render();
            return response()->json(['status' => true, 'message' => 'Result has been added successfully', 'results' => $html]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function store_action_plan(Request $request)
    {

        try {
            DB::beginTransaction();
            ActionPlan::create([
                'title' => $request->newActionPlan,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            $action_plans = Result::where('created_by', Auth::user()->id)->get();
            $html = view('ajax.action_plan', compact('action_plans'))->render();
            return response()->json(['status' => true, 'message' => 'Action Plan has been added successfully', 'action_plans' => $html]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function store_investigation(InvestigationRequest $request, $id)
    {

        try {
            DB::beginTransaction();
            Investigation::create([
                'incident_id' => $id,
                'investigation_date' => $request->date_of_investigation,
                'investigation_time' => $request->time_of_investigation,
                'people_involved' => $request->people_involved,
                'position_of_investigator' => $request->position,
                'location' => $request->location,
                'name_of_investigator' => $request->name_of_investigator,
                'incident_details' => $request->incident_details,
                'result_of_investigation' => $request->results_of_investigation,
                'recommendation' => $request->recommendations,
                'created_by' => Auth::user()->id,

            ]);
            $incident = Incident::find($id);
            $incident->update([
                'status' => 'in_progress',
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Investigation report has been created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit_investigation($id)
    {
        $investigation = Investigation::findOrFail($id);
        return view('company.incidents.edit-investigation', compact('investigation'));
    }

    public function update_investigation(InvestigationRequest $request, $id)
    {

        try {
            $investigation = Investigation::findOrFail($id);
            $investigation->update([
                'investigation_date' => $request->date_of_investigation,
                'investigation_time' => $request->time_of_investigation,
                'people_involved' => $request->people_involved,
                'position_of_investigator' => $request->position,
                'location' => $request->location,
                'name_of_investigator' => $request->name_of_investigator,
                'incident_details' => $request->incident_details,
                'result_of_investigation' => $request->results_of_investigation,
                'recommendation' => $request->recommendations,
            ]);
            return redirect()->route('company.incidents.view_investigations')->with('success', 'Incident Investigation has been updated successfully');
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function view_investigation_report($id)
    {
        $report = Investigation::findOrFail($id);
        return view('company.incidents.view-investigation', compact('report'));
    }

    public function view_action()
    {
        $action_reports = Action::where('created_by', Auth::user()->id)->get();
        return view('company.incidents.view-actions', compact('action_reports'));
    }


    public function create_action($id)
    {
        $positions = Position::where('created_by', Auth::user()->id)->get();
        $action_plans = ActionPlan::where('created_by', Auth::user()->id)->get();
        return view('company.incidents.create-action', compact('id','action_plans','positions'));
    }

    public function store_action(ActionRequest $request, $id)
    {

        try {
            DB::beginTransaction();
            Action::create([
                'investigation_id' => $id,
                'action_date' => $request->date_of_action,
                'action_time' => $request->time_of_action,
                'time_of_completion' => $request->time_frame_of_completion,
                'people_involved' => $request->people_involved,
                'position_of_action_lead' => $request->position,
                'location' => $request->location,
                'name_of_action_lead' => $request->name_of_action_lead,
                'result_of_action' => $request->action_plan_achievement,
                'action_plan' => $request->action_plans,
                'created_by' => Auth::user()->id,
                'status' => $request->action_plan_status == 'In Progress' ? 'in_progress' : 'completed',
            ]);
            if ($request->action_plan_status == 'In Progress') {
                $investigation = Investigation::find($id);
                $investigation->update([
                    'status' => 'in_progress',
                ]);
                $incident = Incident::find($investigation->incident_id);
                $incident->update([
                    'status' => 'in_progress',
                ]);
            } else {
                $investigation = Investigation::find($id);
                $investigation->update([
                    'status' => 'completed',
                ]);

                $incident = Incident::find($investigation->incident_id);
                $incident->update([
                    'status' => 'completed',
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Incident Action has been created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit_action($id)
    {
        $action = Action::findOrFail($id);
        return view('company.incidents.edit-action', compact('action'));
    }

    public function update_action(ActionRequest $request, $id)
    {
        try {
            $action = Action::findOrFail($id);
            DB::beginTransaction();
            $action->update([
                'action_date' => $request->date_of_action,
                'action_time' => $request->time_of_action,
                'time_of_completion' => $request->time_frame_of_completion,
                'people_involved' => $request->people_involved,
                'position_of_action_lead' => $request->position,
                'location' => $request->location,
                'name_of_action_lead' => $request->name_of_action_lead,
                'result_of_action' => $request->action_plan_achievement,
                'action_plan' => $request->action_plans,
                'status' => $request->action_plan_status == 'In Progress' ? 'in_progress' : 'completed',
            ]);
            if ($request->action_plan_status == 'In Progress') {
                $investigation = Investigation::find($request->investigation_id);
                $investigation->update([
                    'status' => 'in_progress',
                ]);
                $incident = Incident::find($investigation->incident_id);
                $incident->update([
                    'status' => 'in_progress',
                ]);
            } else {
                $investigation = Investigation::find($request->investigation_id);
                $investigation->update([
                    'status' => 'completed',
                ]);

                $incident = Incident::find($investigation->incident_id);
                $incident->update([
                    'status' => 'completed',
                ]);
            }
            DB::commit();

            return redirect()->route('company.incidents.view_actions')->with('success', 'Action has been updated successfully');
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function view_action_report($id)
    {
        $report = Action::findOrFail($id);
        return view('company.incidents.view-action', compact('report'));
    }

    public function action_delete($id)
    {
        try {
            $action = Action::where('id', $id)->where('created_by', Auth::user()->id)->first();
            if ($action) {
                DB::beginTransaction();
                $action->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Incident Action has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }



    public function incident_delete($id)
    {
        try {
            $incident = Incident::where('id', $id)->where('created_by', Auth::user()->id)->first();
            if ($incident) {
                DB::beginTransaction();
                $incident->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Incident has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function investigation_delete($id)
    {
        try {
            $investigation = Investigation::where('id', $id)->where('created_by', Auth::user()->id)->first();
            if ($investigation) {
                DB::beginTransaction();
                $investigation->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Incident Investigation has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
