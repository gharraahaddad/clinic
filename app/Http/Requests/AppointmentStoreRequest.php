<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
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
            'doctor_id'=>'required|exists:doctors,id',
            'patient_id'=>'required|exists:patients,id',
            'status'=>'required|in:confirmed,pending,cancelled',
            'time'=>'sometimes',
            'date'=>'nullable'
        ];
    }
}
