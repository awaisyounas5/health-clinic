<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\RiskAssessmentRequest;
use App\Models\RiskAssessment;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiskAssessmentController extends Controller
{

    public function index()
    {
        $risk_assessments = RiskAssessment::select('patient_id', DB::raw('count(*) as total'))
            ->groupBy('patient_id')
            ->get();


        return view('manager.risk_assessments.index', compact('risk_assessments'));
    }

    public function create()
    {
        $patients = User::role('patient')->get();
        $staff_members = User::role('staff_member')->get();
        $templates = Template::where('created_by', Auth::user()->created_by)->get();
        return view('manager.risk_assessments.create', compact('patients', 'staff_members', 'templates'));
    }

    public function store(RiskAssessmentRequest $request)
    {

        try {
            DB::beginTransaction();
            RiskAssessment::create([
                'title' => $request->name,
                'risk_level' => $request->risk_level,
                'patient_id' => $request->patient_id,
                'activity_issue' => $request->activity_issue,
                'hazards_identified' => $request->hazards_identified,
                'affected_persons' => $request->affected_persons,
                'current_measures' => $request->current_measures,
                'further_measures' => $request->further_measures,
                'responsible_staff_id' => $request->responsible_staff_id,
                'days_needed' => $request->days_needed,
                'review_time_frame' => $request->review_time_frame,
                'next_review_date' => $request->next_review_date,
                'reminder_days' => $request->reminder_days,
                'template_name' => $request->template_name,
                'created_by' => Auth::user()->created_by,
            ]);
            if ($request->template_name) {
                Template::create([
                    'title' => $request->template_name,
                    'risk_level' => $request->risk_level,
                    'activity_issue' => $request->activity_issue,
                    'hazards_identified' => $request->hazards_identified,
                    'affected_persons' => $request->affected_persons,
                    'current_measures' => $request->current_measures,
                    'further_measures' => $request->further_measures,
                    'created_by' => Auth::user()->created_by,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Risk Assessment has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function view($id)
    {
        $risk_assessments = RiskAssessment::where('patient_id', $id)->get();
        return view('manager.risk_assessments.view_by_patient', compact('risk_assessments'));
    }
    public function view_assessment($id)
    {
        $report = RiskAssessment::where('id', $id)->where('created_by', Auth::user()->created_by)->first();
        return view('manager.risk_assessments.view', compact('report'));
    }

    public function edit($id)
    {
        $risk_assessment = RiskAssessment::where('id', $id)->where('created_by', Auth::user()->created_by)->first();
        $patients = User::role('patient')->get();
        $staff_members = User::role('staff_member')->get();
        return view('manager.risk_assessments.edit', compact('risk_assessment', 'patients', 'staff_members'));
    }


    public function update($id, RiskAssessmentRequest $request)
    {
        $request->validate([

        ]);
        try {
            DB::beginTransaction();
            RiskAssessment::where('id', $id)->where('created_by', Auth::user()->created_by)->update([
                'title' => $request->name,
                'risk_level' => $request->risk_level,
                'patient_id' => $request->patient_id,
                'activity_issue' => $request->activity_issue,
                'hazards_identified' => $request->hazards_identified,
                'affected_persons' => $request->affected_persons,
                'current_measures' => $request->current_measures,
                'further_measures' => $request->further_measures,
                'responsible_staff_id' => $request->responsible_staff_id,
                'days_needed' => $request->days_needed,
                'review_time_frame' => $request->review_time_frame,
                'next_review_date' => $request->next_review_date,
                'reminder_days' => $request->reminder_days,
                'template_name' => $request->template_name,
            ]);
            if ($request->template_name) {
                Template::create([
                    'title' => $request->template_name,
                    'risk_level' => $request->risk_level,
                    'activity_issue' => $request->activity_issue,
                    'hazards_identified' => $request->hazards_identified,
                    'affected_persons' => $request->affected_persons,
                    'current_measures' => $request->current_measures,
                    'further_measures' => $request->further_measures,
                    'created_by' => Auth::user()->created_by,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Risk Assessment has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $risk_assessment = RiskAssessment::find($id);
            if ($risk_assessment) {
                DB::beginTransaction();
                $risk_assessment->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Risk Assessment has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function template_create()
    {
        return view('manager.risk_assessments.template_create');
    }


    public function template_store(Request $request)
    {
        try {
            DB::beginTransaction();
            Template::create([
                'title' => $request->title,
                'risk_level' => $request->risk_level,
                'activity_issue' => $request->activity_issue,
                'hazards_identified' => $request->hazards_identified,
                'affected_persons' => $request->affected_persons,
                'current_measures' => $request->current_measures,
                'further_measures' => $request->further_measures,
                'created_by' => Auth::user()->created_by,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Assessment Template has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function template_list()
    {
        $templates = Template::where('created_by', Auth::user()->created_by)->get();
        return view('manager.risk_assessments.template', compact('templates'));
    }

    public function template(Request $request)
    {
        try {
            $template = Template::where('title', $request->template)->where('created_by', Auth::user()->created_by)->first();
            return response()->json(['template' => $template]);
        } catch (\Exception $e) {

            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function template_edit($id)
    {
        $template = Template::where('id', $id)->where('created_by', Auth::user()->created_by)->first();
        return view('manager.risk_assessments.template_edit', compact('template'));
    }

    public function template_update(Request $request,$id){
        try {
            DB::beginTransaction();
            Template::where('id', $id)->where('created_by', Auth::user()->created_by)->update([
                'title' => $request->template_name,
                'risk_level' => $request->risk_level,
                'activity_issue' => $request->activity_issue,
                'hazards_identified' => $request->hazards_identified,
                'affected_persons' => $request->affected_persons,
                'current_measures' => $request->current_measures,
                'further_measures' => $request->further_measures,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Assessment Template has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function template_delete($id)
    {
        try {
            $risk_assessment = Template::find($id);
            if ($risk_assessment) {
                DB::beginTransaction();
                $risk_assessment->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Risk Assessment Template has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
