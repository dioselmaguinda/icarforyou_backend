<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Models::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'body_style' => 'required|string',
            'brand_id' => 'required|exists:brands,brand_id',
        ]);


        // Create the vehicle
        $models = Models::create([
            'name' => $validatedData['name'],
            'body_style' => $validatedData['body_style'],
            'brand_id' => $validatedData['brand_id']
        ]);


        // Return the created vehicle
        return $models;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'body_style' => 'required|string',
            'brand_id' => 'required|exists:brands,brand_id'
        ]);


        $models = Models::findOrFail($id);


        // Update the vehicle attributes
        $models->update($validatedData);


        return $models;
    }




    public function destroy($id)
    {
        // Logic to retrieve the specific vehicle before deleting it
        $models = Models::findOrFail($id);


        // Store the data before deletion
        $deletedData = $models->toArray();


        // Delete the vehicle
        $models->delete();


        // Return the deleted data in the response
        return response()->json(['message' => 'Model deleted successfully', 'deleted_data' => $deletedData]);
    }
}
