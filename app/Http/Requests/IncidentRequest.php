<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidentRequest extends FormRequest
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
            'date'=>'required',
            'time'=>'required',
            'people_involved'=>'required',
            'position'=>'required',
            'location'=>'required',
            'name_of_reporter'=>'required',
            'incident_details'=>'required',
            'severity_of_incidents'=>'required',
            'type_of_incidents'=>'required',
            'possible_trigger'=>'required',
            'recommendations'=>'required',
        ];
    }
}
