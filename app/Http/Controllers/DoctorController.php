<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorStoreRequest;
use App\Http\Requests\DoctorUpdateRequest;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DoctorResource::collection(Doctor::get());
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorStoreRequest $request)
    {
          $doctor = Doctor::create($request->validated());

        return response()->json([
            'message' => 'Doctor created successfully.',
            'data'    => new DoctorResource($doctor)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
  $doctor = Doctor::findOrFail($id);

        return response()->json([
            'message' => 'Doctor retrieved successfully.',
            'data'    => new DoctorResource($doctor)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorUpdateRequest $request, $id)
    {
           $doctor = Doctor::findOrFail($id);
        $doctor->update($request->validated());

        return response()->json([
            'message' => 'Doctor updated successfully.',
            'data'    => new DoctorResource($doctor)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    Doctor::destroy($id);

        return response()->json([
            'message' => 'Doctor deleted successfully.'
        ]);
    }
}
