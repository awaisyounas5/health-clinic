<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerRequest;
use App\Http\Requests\ManagerUpdateRequest;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class ManagerController extends Controller
{
    use ImageUpload;
    public function index()
    {
        $managers = User::role('manager')->where('created_by', Auth::id())->get();
        return view('company.managers.index', compact('managers'));
    }

    public function create()
    {
        return view('company.managers.create');
    }

    public function store(ManagerRequest $request)
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
                'created_by' => Auth::user()->id,
                'surname' => $request->sur_name,
                'prefered_name' => $request->preffered_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'legal_representative_name' => $request->legal_representative_name,
                'bio' => $request->bio,
                'date_of_birth' => $request->date_of_birth,
                'allergies' => $request->allergies,
                'photo' => $file_name??null,
                'position'=>$request->position,
                'cv'=>$cv??null,
                'certificate'=>$certificate??null,
                'date_of_employment'=>$request->date_of_employment,
                'status'=>'approved',

            ])->assignRole('manager');
            $response =Password::sendResetLink($request->only('email'));
            DB::commit();
            return redirect()->back()->with('success','Manager has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function view($id)
    {
        $manager = User::role('manager')->where('id',$id)->where('created_by',Auth::user()->id)->first();
        return view('company.managers.view', compact('manager'));
    }
    public function edit($id)
    {
        $manager = User::role('manager')->where('id',$id)->where('created_by',Auth::user()->id)->first();
        return view('company.managers.edit', compact('manager'));
    }

    public function update($id, ManagerUpdateRequest $request)
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
            $manager = User::role('manager')->where('id',$id)->where('created_by',Auth::user()->id)->first();
            $manager_update = $manager->update([
                'name' => $request->first_name,
                'email' => $request->email,
                'created_by' => Auth::user()->id,
                'surname' => $request->sur_name,
                'prefered_name' => $request->preffered_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'legal_representative_name' => $request->legal_representative_name,
                'bio' => $request->bio,
                'date_of_birth' => $request->date_of_birth,
                'allergies' => $request->allergies,
                'photo' => $file_name??null,
                'position'=>$request->position,
                'cv'=>$cv ?? null,
                'certificate'=>$certificate ?? null,
                'date_of_employment'=>$request->date_of_employment,
                'status'=>'approved',

            ]);
            $response =Password::sendResetLink($request->only('email'));
            DB::commit();
            return redirect()->back()->with('success','Manager has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function delete($id)
    {
        try {
            $manager = User::role('manager')->where('id',$id)->where('created_by',Auth::user()->id)->first();
            if ($manager) {
                DB::beginTransaction();
                $manager->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Manager has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
