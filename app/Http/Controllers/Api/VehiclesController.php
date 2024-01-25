<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Vehicle::all();
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'vin' => 'required|string',
            'color' => 'required|string',
            'engine' => 'required|string',
            'transmission' => 'required|string',
            'date_of_sale' => 'required|date',
            'brand_id' => 'required|exists:brands,brand_id',
            'model_id' => 'required|exists:models,model_id',
            'option_id' => 'required|exists:options,option_id',
            'dealer_id' => 'required|exists:dealers,dealer_id',
            'customer_id' => 'required|exists:customers,customer_id',
        ]);


        // Create the supplier
        $vehicle = Vehicle::create([
            'vin' => $validatedData['vin'],
            'color' => $validatedData['color'],
            'engine' => $validatedData['engine'],
            'transmission' => $validatedData['transmission'],
            'date_of_sale' => $validatedData['date_of_sale'],
            'brand_id' => $validatedData['brand_id'],
            'model_id' => $validatedData['model_id'],
            'option_id' => $validatedData['option_id'],
            'dealer_id' => $validatedData['dealer_id'],
            'customer_id' => $validatedData['customer_id'],
        ]);

        // Return the created Vehicle
        return response()->json(['message' => 'Vehicle created successfully', 'vehicle' => $vehicle], 201);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'vin' => 'required|string',
            'color' => 'required|string',
            'engine' => 'required|string',
            'transmission' => 'required|string',
            'date_of_sale' => 'required|date',
            'brand_id' => 'required|exists:brands,brand_id',
            'model_id' => 'required|exists:models,model_id',
            'option_id' => 'required|exists:options,option_id',
            'dealer_id' => 'required|exists:dealers,dealer_id',
            'customer_id' => 'required|exists:customers,customer_id',
        ]);


        $vehicle = Vehicle::findOrFail($id);


        // Update the supplier attributes
        $vehicle->update($validatedData);


        return $vehicle;
    }




    public function destroy($id)
    {
        // Logic to retrieve the specific vehicle before deleting it
        $vehicle = Vehicle::findOrFail($id);


        // Store the data before deletion
        $deletedData = $vehicle->toArray();


        // Delete the vehicle
        $vehicle->delete();


        // Return the deleted data in the response
        return response()->json(['message' => 'Vehicle deleted successfully', 'deleted_data' => $deletedData]);
    }
}
