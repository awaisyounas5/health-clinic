<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActionRequest extends FormRequest
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
            'date_of_action'=>'required',
            'time_of_action'=>'required',
            'time_frame_of_completion'=>'required',
            'people_involved'=>'required',
            'position'=>'required',
            'location'=>'required',
            'name_of_action_lead'=>'required',
            'action_plan_achievement'=>'required',
            'action_plans'=>'required',
        ];
    }
}
