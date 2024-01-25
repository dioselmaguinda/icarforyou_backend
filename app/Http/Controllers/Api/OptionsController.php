<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Option::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'color' => 'required|string',
            'engine' => 'required|string',
            'transmission' => 'required|string',
        ]);


        // Create the option
        $options = Option::create([
            'color' => $validatedData['color'],
            'engine' => $validatedData['engine'],
            'transmission' => $validatedData['transmission'],
        ]);


        // Return the created option
        return $options;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'color' => 'required|string',
            'engine' => 'required|string',
            'transmission' => 'required|string',
        ]);


        $options = Option::findOrFail($id);


        // Update the option attributes
        $options->update($validatedData);


        return $options;
    }




    public function destroy($id)
    {
        // Logic to retrieve the specific option before deleting it
        $options = Option::findOrFail($id);


        // Store the data before deletion
        $deletedData = $options->toArray();


        // Delete the option
        $options->delete();


        // Return the deleted data in the response
        return response()->json(['message' => 'Option deleted successfully', 'deleted_data' => $deletedData]);
    }
}
