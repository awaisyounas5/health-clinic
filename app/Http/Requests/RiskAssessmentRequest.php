<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RiskAssessmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'patient_id'=>'required',
            'name'=>'required',
            'risk_level'=>'required',
            'activity_issue'=>'required',
            'hazards_identified'=>'required',
            'affected_persons'=>'required',
            'current_measures'=>'required',
            'further_measures'=>'required',
            'responsible_staff_id'=>'required',
            'days_needed'=>'required',
            'review_time_frame'=>'required',
            'next_review_date'=>'required',
            'reminder_days'=>'required',
        ];
    }
}
