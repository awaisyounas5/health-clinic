<?php

namespace App\Http\Controllers\Api\Patient\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    use ImageUpload;
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

            return response()->json(['status'=>true,'Review'=>$review]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
}
