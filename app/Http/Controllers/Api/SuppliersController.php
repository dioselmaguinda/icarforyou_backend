<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Supplier::all();
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


        // Create the supplier
        $suppliers = Supplier::create([
            'name' => $validatedData['name'],
        ]);


        // Return the created supplier
        return $suppliers;
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


        $suppliers = Supplier::findOrFail($id);


        // Update the supplier attributes
        $suppliers->update($validatedData);


        return $suppliers;
    }




    public function destroy($id)
    {
        // Logic to retrieve the specific supplier before deleting it
        $suppliers = Supplier::findOrFail($id);


        // Store the data before deletion
        $deletedData = $suppliers->toArray();


        // Delete the supplier
        $suppliers->delete();


        // Return the deleted data in the response
        return response()->json(['message' => 'Supplier deleted successfully', 'deleted_data' => $deletedData]);
    }
}
