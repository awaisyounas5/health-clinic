<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Medication;
use App\Models\Observeration;
use App\Models\Routine;
use App\Models\Shift;
use App\Models\ShiftFinding;
use App\Models\ShiftObservation;
use App\Models\ShiftTask;
use Illuminate\Http\Request;

class ShiftNoteController extends Controller
{
    public function index()
    {
        $shift_notes = Shift::where('status','complete')->get();


        $patient_ids = $shift_notes->pluck('patient_id')->toArray();
        $unique_patient_ids = array_unique($patient_ids);

        $filtered_shifts = [];
        foreach ($unique_patient_ids as $patient_id) {
            $filtered_shifts[] = $shift_notes->where('patient_id', $patient_id)->first();
        }

        $shift_notes = $filtered_shifts;

        return view('manager.note.index', compact('shift_notes'));
    }


    public function view($id)
    {
        $shifts = Shift::where('status', 'complete')->where('patient_id', $id)->get();

        return view('manager.note.view_by_shift', compact('shifts'));
    }

    public function view_details($id)
    {
        try {
            $shift_tasks = ShiftTask::where('shift_id', $id)->get();
            $shift = Shift::where('id', $id)->first();

            $shift_findings = ShiftFinding::where('shift_id', $id)->first();
            $shift_observations = ShiftObservation::where('shift_id', $id)->first();
            if ($shift_tasks || $shift_findings || $shift_observations) {
                $groupedTasks = $shift_tasks->groupBy('category_type');
                $routines = collect();
                $medications = collect();
                $observations = collect();
                if (isset($groupedTasks['routine'])) {
                    $routineIds = $groupedTasks['routine']->pluck('category_id');
                    $routines = Routine::whereIn('id', $routineIds)->get();
                }


                if (isset($groupedTasks['medication'])) {
                    $medicationIds = $groupedTasks['medication']->pluck('category_id');
                    $medications = Medication::whereIn('id', $medicationIds)->get();
                }


                if (isset($groupedTasks['observation'])) {
                    $observationIds = $groupedTasks['observation']->pluck('category_id');
                    $observations = Observeration::whereIn('id', $observationIds)->get();
                }

                $categoryData = [
                    'routine' => $routines->toArray(),
                    'medication' => $medications->toArray(),
                    'observation' => $observations->toArray()
                ];

                $shiftTaskData = $shift_tasks->map(function ($task) use ($categoryData) {
                    return [
                        'id' => $task->id,
                        'shift_id' => $task->shift_id,
                        'category_type' => $task->category_type,
                        'category_id' => $task->category_id,
                        'cateory_data' => $categoryData,
                        'status' => $task->status,
                        'reason_for_no' => $task->reason_for_no,
                        'created_by' => $task->created_by,
                    ];
                });



                return view('manager.note.view',[
                    'shift' => $shift,
                    'shift_findings' => $shift_findings,
                    'shift_observations' => $shift_observations,
                    'shift_tasks' => $shiftTaskData->toArray(),

                ]);
            } else {
                return response()->json(['status' => false, 'message' => 'No data found for the specified shift.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
