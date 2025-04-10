<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Compliment;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ComplimentController extends Controller
{
    use ImageUpload;

    public function create()
    {
        return view('patient.reviews.compliment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        try {
            if($request->hasFile('attachment'))
            {
                $file_name = $this->imageUpload($request->file('attachment'));
            }

            DB::beginTransaction();
            $compliment = Compliment::create([
                'description' => $request->description,
                'attachment' => $file_name??null,
                'patient_id' => Auth::id(),
            ]);

            DB::commit();

            return redirect()->route('patient.compliments')->with('success', 'Compliment submitted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('patient.compliments')->with('error', 'Failed to submit compliment. Please try again.');
        }
    }
}
