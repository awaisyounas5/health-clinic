<?php

namespace App\Http\Controllers\Patient;


use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Review;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ReviewController extends Controller
{
    use ImageUpload;

    public function create()
    {
        return view('patient.reviews.review');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'category'=>'required',
        ]);

        try {
            if($request->hasFile('attachment')){

                $file_name = $this->imageUpload($request->file('attachment'));
            }

            DB::beginTransaction();

            $review = Review::create([
                'description' => $request->description,
                'attachment' => $file_name ?? null,
                'patient_id' => Auth::id(),
                'category'=>$request->category,
            ]);


            DB::commit();

            return redirect()->route('patient.reviews')->with('success', 'Review has been submitted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('patient.reviews')->with('error', 'Failed to submit complaint. Please try again.');
        }
    }
}
