<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayRateRequest;
use App\Models\PayRate;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayRateController extends Controller
{
    public function index()
    {
        $pay_rates = PayRate::where('created_by', Auth::id())->get();
        return view('company.pay_rates.index', compact('pay_rates'));
    }

    public function create()
    {
        $teams = Team::where('created_by', Auth::id())->get();
        $staffs = User::role('staff_member')->where('created_by', Auth::id())->get();
        return view('company.pay_rates.create', compact('teams', 'staffs'));
    }

    public function store(PayRateRequest $request)
    {
        try {

            DB::beginTransaction();
            PayRate::create([
                'team_id'=>$request->team_id,
                'staff_id' => $request->staff_id,
                'title' => $request->name,
                'created_by' => Auth::user()->id,
                'amount' => $request->amount,
            ]);
            DB::commit();
            return redirect()->back()->with('success','Pay Rate has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $pay_rate = PayRate::find($id);
        $teams = Team::where('created_by', Auth::id())->get();
        $staffs = User::role('staff_member')->where('created_by', Auth::id())->get();
        return view('company.pay_rates.edit', compact('pay_rate', 'teams', 'staffs'));
    }

    public function update($id, PayRateRequest $request)
    {
        try {
            DB::beginTransaction();
            $pay_rate = PayRate::find($id);
            $pay_rates_update = $pay_rate->update([
                'team_id'=>$request->team_id,
                'staff_id' => $request->staff_id,
                'title' => $request->name,
                'amount' => $request->amount,
            ]);
            DB::commit();
            return redirect()->back()->with('success','Pay Rate has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function delete($id)
    {
        try {
            $pay_rate = PayRate::find($id);
            if ($pay_rate) {
                DB::beginTransaction();
                $pay_rate->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'PayRate has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
