<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'first_name'=>'required',
            'sur_name'=>'required',
            'address'=>'required',
            'phone_number'=>'required',
            'bio'=>'required',
            'date_of_birth'=>'required',
            'position'=>'required',
            'date_of_employment'=>'required',
        ];
    }
}
