<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoasterRequest extends FormRequest
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
            'team_id'=>'required',
            'patient_id'=>'required',
            'staff_id'=>'required',
            'payrate_id'=>'required',
            'shift_type_id'=>'required',
            'background_color'=>'required',
            'start_date'=>'required',
            'end_time'=>'required',
        ];
    }
}
