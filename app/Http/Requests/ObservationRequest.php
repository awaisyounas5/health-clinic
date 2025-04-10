<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObservationRequest extends FormRequest
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
            'patient_id' => 'required',
            'respiratory_rate' => 'required|string',
            'body_temperature' => 'required|string',
            'spo2_level' => 'required|string',
            'inspired_o2' => 'required|string',
            'blood_pressure_level' => 'required|string',
            'heart_beat_rate' => 'required|string',
            'concious_level' => 'required|string',
        ];
    }
}
