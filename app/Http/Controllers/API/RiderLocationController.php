<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RiderLocation;
use Illuminate\Support\Facades\Validator;

class RiderLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate request data
        $validator = Validator::make($request->all(), [
            'rider_id' => 'required|integer',
            'service_name' => 'required|string',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'capture_time' => 'required|date',
        ]);

       


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            // Store RiderLocation
            $riderLocation = RiderLocation::create($validator->validated());

            return response()->json($riderLocation, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $riderLocation = RiderLocation::findOrFail($id);
            return response()->json(['riderLocation' => $riderLocation], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $riderLocation = RiderLocation::findOrFail($id);
            return response()->json(['riderLocation' => $riderLocation], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [

            'rider_id' => 'required|integer',
            'service_name' => 'required|string',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'capture_time' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $riderLocation = RiderLocation::findOrFail($id);
            $riderLocation->update($validator->validated());
            return response()->json(['riderLocation' => $riderLocation], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $RiderLocation = RiderLocation::findOrFail($id);
            $RiderLocation->delete();
            return response()->json(['message' => 'Rider Location deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
