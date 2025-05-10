<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentStoreRequest;
use App\Http\Requests\AppointmentUpdateRequest;
use App\Http\Resources\AppiontmentResource;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\PatientResource;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointment=Appointment::with(['patient','doctor'])->get();
          return AppointmentResource::collection($appointment);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentStoreRequest $request)
    {

  $appointment = Appointment::create($request->validated());
  return response()->json([
        'message' => 'appointment created successfully.',
        'data' => new AppointmentResource($appointment)
    ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
          $appointment = Appointment::findOrFail($id);

        return response()->json([
            'message' => 'Appointment retrieved successfully.',
            'data'    => new AppointmentResource($appointment)
        ]);
    }


    public function update(AppointmentUpdateRequest $request, $id)
    {
$appointment=Appointment::findorfail($id);
$appointment->update($request->validated());

 return response()->json([
            'message' => 'Appointment retrieved successfully.',
            'data'    => new AppointmentResource($appointment)
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
Appointment::destroy($id);
return response()->json(['message'=>'appointment deleted successfuly']);
    }
}
