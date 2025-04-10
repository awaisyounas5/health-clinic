<?php

namespace App\Http\Controllers\Api\Staff\Roaster;

use App\Http\Controllers\Controller;
use App\Models\Medication;
use App\Models\Observeration;
use App\Models\Routine;
use App\Models\Shift;
use App\Models\ShiftFinding;
use App\Models\ShiftObservation;
use App\Models\ShiftTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoasterController extends Controller
{
    public function index(Request $request)
    {
        $shift = Shift::with(['staff', 'patient', 'shift_type'])->where('staff_id', Auth::user()->id)->get();

        return response()->json(['status' => true, 'shift' => $shift]);
    }

    public function change_status($id, Request $request)
    {
        try {
            $shift = Shift::where('id', $id)->where('staff_id', Auth::user()->id)->first();
            DB::beginTransaction();
            $shift->update([
                'status' => $request->status,
            ]);

            DB::commit();
            return response()->json(['status' => true, 'shift' => $shift]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function shift_task($id, Request $request)
    {

        try {

            DB::beginTransaction();
            $dataArray = $request->input('shift_tasks');
            $shift_id = $dataArray[0]['shift_id'];
            $shiftTasks = [];
            foreach ($dataArray as $data) {

                $shiftTask = ShiftTask::create([
                    'shift_id' => $data['shift_id'],
                    'category_type' => $data['category_type'],
                    'category_id' => $data['category_id'],
                    'status' => $data['status'] ?? 'yes',
                    'reason_for_no' => $data['reason_for_no'] ?? null, // Handle possible null values
                    'created_by' => Auth::user()->id,
                ]);
                $shiftTasks[] = $shiftTask;
            }
            $shift_finding = ShiftFinding::create([
                'shift_id' => $shift_id,
                'additional_findings' => $request->additional_findings,
                'created_by' => Auth::user()->id,
            ]);
            $shift_observation = ShiftObservation::create([
                'shift_id' => $shift_id,
                'observation' => $request->observation,
                'respiratory_rate' => $request->respiratory_rate,
                'body_temperature' => $request->body_temperature,
                'spo2_level' => $request->spo2_level,
                'inspired_o2' => $request->inspired_o2,
                'blood_pressure_level' => $request->blood_pressure_level,
                'heart_beat_rate' => $request->heart_beat_rate,
                'concious_level' => $request->concious_level,
                'additional_notes' => $request->additional_notes,
                'status' => $request->observation_status ?? 'yes',
                'created_by' => Auth::user()->id,
            ]);
            $shift = Shift::find($shift_id);
            $shift_update = $shift->update([
                'status' => 'complete'
            ]);

            DB::commit();
            return response()->json(['status' => true, 'shift_task' => $shiftTasks, 'shift_finding' => $shift_finding, 'shift_observation' => $shift_observation]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function shift_task_detail($id)
    {
        try {
            $shift_tasks = ShiftTask::where('shift_id', $id)->where('created_by', Auth::user()->id)->get();
            $shift_findings = ShiftFinding::where('shift_id', $id)->where('created_by', Auth::user()->id)->first();
            $shift_observations = ShiftObservation::where('shift_id', $id)->where('created_by', Auth::user()->id)->first();
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
                        'cateory_data'=>$categoryData,
                        'status' => $task->status,
                        'reason_for_no' => $task->reason_for_no,
                        'created_by' => $task->created_by,
                    ];
                });




                return response()->json([
                    'status' => true,
                    'shift_tasks' => $shift_tasks,
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
