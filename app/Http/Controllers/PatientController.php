<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return PatientResource::collection(Patient::get());
    }


    public function store(PatientStoreRequest $request)
    {
 $patient = Patient::create($request->validated());

        return response()->json([
            'message' => 'Patient created successfully.',
            'data'    => new PatientResource($patient)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $patient = Patient::findOrFail($id);

        return response()->json([
            'message' => 'Patient retrieved successfully.',
            'data'    => new PatientResource($patient)
        ]);
    }


    public function update(PatientUpdateRequest $request, $id)
    {
         $patient = Patient::findOrFail($id);
        $patient->update($request->validated());

        return response()->json([
            'message' => 'Patient updated successfully.',
            'data'    => new PatientResource($patient)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         Patient::destroy($id);

        return response()->json([
            'message' => 'Patient deleted successfully.'
        ]);
    }
}
