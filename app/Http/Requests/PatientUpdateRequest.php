<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users,email,'. $this->id,
            'first_name'=>'required',
            'sur_name'=>'required',
            'preffered_name'=>'required',
            'address'=>'required',
            'phone_number'=>'required',
            'legal_representative_name'=>'required',
            'bio'=>'required',
            'date_of_birth'=>'required',
            'allergies'=>'required',
        ];
    }
}
