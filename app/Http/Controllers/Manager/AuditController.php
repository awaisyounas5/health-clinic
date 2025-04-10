<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuditRequest;
use App\Models\Audit;
use App\Models\AuditStandard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{

    public function index(){
        $audits=Audit::where('created_by',Auth::user()->created_by)->get();
        return view('manager.audits.index',compact('audits'));
    }
    public function create(){
        return view('manager.audits.create');
    }

    public function store(AuditRequest $request)
    {

        try{
            DB::beginTransaction();
            $audit =Audit::create([
                'name'=>$request->name,
                'location'=>$request->location,
                'completed'=>'0%',
                'created_by'=>Auth::user()->created_by,
            ]);
            foreach ($request->standard as $standard) {
                AuditStandard::create([
                    'audit_id' => $audit->id,
                    'standard' => $standard,
                    'created_by'=>Auth::user()->created_by,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success','Audit has been created successfully');
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }

    }

    public function edit($id){
        $audit=Audit::with('audit_standard')->where('id',$id)->where('created_by',Auth::user()->created_by)->first();
        return view('manager.audits.edit',compact('audit'));
    }

    public function update(AuditRequest $request,$id){
        try{

            DB::beginTransaction();
            $audit =Audit::where('id',$id)->update([
                'name'=>$request->name,
                'location'=>$request->location,
            ]);
            foreach ($request->standard_id as $index => $standard) {
                $standardId = $request->standard_id[$index];

                AuditStandard::updateOrCreate(
                    [
                        'id' => $standardId,
                    ],
                    [
                        'standard' => $request->standard[$index],
                        'issues' => $request->issues[$index],
                        'resolved' => $request->resolved[$index],
                        'additional_info' => $request->additional_info[$index],
                        'status'=>(isset($request->checkbox[$index]) && $request->checkbox[$index]=="on") ?'completed':'in_progress',

                    ]
                );
            }
            $totalStandards = count($request->standard_id);
            $completedStandards = AuditStandard::whereIn('id', $request->standard_id)
                ->where('status', 'completed')
                ->count();
            $completionPercentage = ($completedStandards / $totalStandards) * 100;
            $updateData = ['completed' => $completionPercentage . '%'];
            if ($completionPercentage == 100) {
                $updateData['status'] = 'completed';
            }
            else{
                $updateData['status'] = 'in_progress';
            }
            Audit::where('id', $id)->update($updateData);
            DB::commit();
            return redirect()->back()->with('success','Audit has been udpated successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }

    }

    public function delete($id)
    {
        try {
            $audit = Audit::where('id', $id)->where('created_by', Auth::user()->created_by)->first();
            if ($audit) {
                $audit->delete();
            }

            return response()->json(['status' => true, 'message' => "Audit has been deleted successfully"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
