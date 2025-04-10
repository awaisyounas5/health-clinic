<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuggestionController extends Controller
{

    public function create()
    {
        return view('patient.reviews.suggestion');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            $suggestion = Suggestion::create([
                'description'=>$request->description,
                'patient_id'=>Auth::id(),
            ]);
            DB::commit();

            return redirect()->route('patient.suggestions')->with('success', 'Suggestion submitted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('patient.suggestions')->with('error', 'Failed to submit suggestion. Please try again.');
        }
    }
}
