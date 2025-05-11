<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentUpdateRequest extends FormRequest
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
                'doctor_id'=>'sometimes|exists:doctors,id',
            'patient_id'=>'sometimes|exists:patients,id',
            'status'=>'sometimes|in:confirmed,pending,cancelled',
            'time'=>'sometimes',
            'date'=>'sometimes'
        ];
    }
}
