<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigationRequest extends FormRequest
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
            'date_of_investigation'=>'required',
            'time_of_investigation'=>'required',
            'people_involved'=>'required',
            'position'=>'required',
            'location'=>'required',
            'name_of_investigator'=>'required',
            'incident_details'=>'required',
            'results_of_investigation'=>'required',
            'recommendations'=>'required',
        ];
    }
}
