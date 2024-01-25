<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManufacturingPlant;

class ManufacturingPlantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ManufacturingPlant::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);


        $manufacturing_plants = ManufacturingPlant::create([
            'name' => $validatedData['name'],
        ]);


        return $manufacturing_plants;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);


        $manufacturing_plants = ManufacturingPlant::findOrFail($id);


        $manufacturing_plants->update($validatedData);


        return $manufacturing_plants;
    }




    public function destroy($id)
    {
        // Logic to retrieve the specific manufacturing plant before deleting it
        $manufacturing_plants = ManufacturingPlant::findOrFail($id);


        $deletedData = $$manufacturing_plants->toArray();


        $$manufacturing_plants->delete();


        // Return the deleted data in the response
        return response()->json(['message' => 'Manufacturing Plant deleted successfully', 'deleted_data' => $deletedData]);
    }
}
