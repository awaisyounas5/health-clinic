<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
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
            'address'=>'required',
            'phone_number'=>'required',
            'team_id'=>'required',
            'shift_patterns'=>'required',
            'date_of_birth'=>'required',
            'induction'=>'required',
            'date_of_employment'=>'required',
            'probation'=>'required',
            'training'=>'required',
            'contracted_hours'=>'required',
        ];
    }
}
