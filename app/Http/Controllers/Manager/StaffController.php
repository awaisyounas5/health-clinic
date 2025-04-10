<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Models\Team;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class StaffController extends Controller
{
    use ImageUpload;
    public function index()
    {
        $staffs = User::role('staff_member')->where('created_by', Auth::user()->created_by)->get();
        return view('manager.staffs.index', compact('staffs'));
    }

    public function create()
    {
        $teams = Team::where('created_by', Auth::user()->created_by)->get();
        return view('manager.staffs.create',compact('teams'));
    }

    public function store(StaffRequest $request)
    {
        try {
            if($request->hasFile('photo')){
                $file_name=$this->imageUpload($request->photo);

            }
            if($request->hasFile('cv')){
                $cv=$this->imageUpload($request->cv);
            }
            if($request->hasFile('certificate')){
                $certificate=$this->imageUpload($request->certificate);
            }
            DB::beginTransaction();
            User::create([
                'name' => $request->first_name,
                'email' => $request->email,
                'created_by' => Auth::user()->created_by,
                'surname' => $request->sur_name,
                'prefered_name' => $request->preffered_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'team_id' => $request->team_id,
                'shift_patterns'=>$request->shift_patterns,
                'bio' => $request->bio,
                'date_of_birth' => $request->date_of_birth,
                'induction' => $request->induction,
                'photo' => $file_name??null,
                'position'=>$request->position,
                'cv'=>$cv??null,
                'certificate'=>$certificate??null,
                'training' => $request->training,
                'probation' => $request->probation,
                'contracted_hours' => $request->contracted_hours,
                'date_of_employment'=>$request->date_of_employment,
                'status'=>'approved',

            ])->assignRole('staff_member');
            $response =Password::sendResetLink($request->only('email'));
            DB::commit();
            return redirect()->back()->with('success','Staff has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function view($id)
    {
        $staff = User::role('staff_member')->where('id',$id)->where('created_by',Auth::user()->created_by)->first();
        return view('manager.staffs.view', compact('staff'));
    }
    public function edit($id)
    {
        $staff = User::role('staff_member')->where('id',$id)->where('created_by',Auth::user()->created_by)->first();
        $teams = Team::where('created_by', Auth::user()->created_by)->get();
        return view('manager.staffs.edit', compact('staff','teams'));
    }

    public function update($id, StaffUpdateRequest $request)
    {

        if($request->hasFile('photo')){
            $file_name=$this->imageUpload($request->photo);
        }
        if($request->hasFile('cv')){
            $cv=$this->imageUpload($request->cv);
        }
        if($request->hasFile('certificate')){
            $certificate=$this->imageUpload($request->certificate);
        }
        try {
            DB::beginTransaction();
            $staff = User::role('staff_member')->where('id',$id)->where('created_by',Auth::user()->created_by)->first();
            $staff_update = $staff->update([
                'name' => $request->first_name,
                'email' => $request->email,
                'surname' => $request->sur_name,
                'prefered_name' => $request->preffered_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'team_id' => $request->team_id,
                'shift_patterns'=>$request->shift_patterns,
                'bio' => $request->bio,
                'date_of_birth' => $request->date_of_birth,
                'induction' => $request->induction,
                'photo' => $file_name??null,
                'position'=>$request->position,
                'cv'=>$cv??null,
                'certificate'=>$certificate??null,
                'training' => $request->training,
                'probation' => $request->probation,
                'contracted_hours' => $request->contracted_hours,
                'date_of_employment'=>$request->date_of_employment,

            ]);
            $response =Password::sendResetLink($request->only('email'));
            DB::commit();
            return redirect()->back()->with('success','Staff has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function delete($id)
    {
        try {
            $staff = User::role('staff_member')->where('id',$id)->where('created_by',Auth::user()->created_by)->first();
            if ($staff) {
                DB::beginTransaction();
                $staff->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Staff has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
