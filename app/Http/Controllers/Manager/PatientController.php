<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class PatientController extends Controller
{
    use ImageUpload;
    public function index()
    {
        $patients = User::role('patient')->where('created_by', Auth::user()->created_by)->get();
        return view('manager.patients.index', compact('patients'));
    }

    public function create()
    {
        return view('manager.patients.create');
    }

    public function store(PatientRequest $request)
    {

        try {
            if($request->hasFile('photo')){
                $file_name=$this->imageUpload($request->photo);
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
                'legal_representative_name' => $request->legal_representative_name,
                'bio' => $request->bio,
                'date_of_birth' => $request->date_of_birth,
                'allergies' => $request->allergies,
                'photo' => $file_name??null,
                'status'=>'approved',

            ])->assignRole('patient');
            $response =Password::sendResetLink($request->only('email'));
            DB::commit();
            return redirect()->back()->with('success','Patient has been created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function view($id)
    {
        $patient = User::role('patient')->where('id',$id)->where('created_by',Auth::user()->created_by)->first();
        return view('manager.patients.view', compact('patient'));
    }
    public function edit($id)
    {
        $patient = User::role('patient')->where('id',$id)->where('created_by',Auth::user()->created_by)->first();
        return view('manager.patients.edit', compact('patient'));
    }

    public function update($id, PatientUpdateRequest $request)
    {

        try {
            DB::beginTransaction();
            $patient = User::role('patient')->where('id',$id)->where('created_by',Auth::user()->created_by)->first();
            $patient_update = $patient->update([
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
                'photo' => $request->picture,


            ]);
            $response =Password::sendResetLink($request->only('email'));
            DB::commit();
            return redirect()->back()->with('success','Patient has been updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function delete($id)
    {
        try {
            $patient = User::role('patient')->where('id',$id)->where('created_by',Auth::user()->created_by)->first();
            if ($patient) {
                DB::beginTransaction();
                $patient->delete();
                DB::commit();
            }
            return response()->json(['status' => true, 'message' => 'Patient has been deleted successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
