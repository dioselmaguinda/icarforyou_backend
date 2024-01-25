<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inventory::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'color' => 'required|string',
            'engine' => 'required|string',
            'transmission' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'date_of_sale' => 'required|date',
        ]);


        // Create the inventories
        $inventories = Inventory::create([
            'brand' => $validatedData['brand'],
            'model' => $validatedData['model'],
            'color' => $validatedData['color'],
            'engine' => $validatedData['engine'],
            'transmission' => $validatedData['transmission'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'date_of_sale' => $validatedData['date_of_sale'],
        ]);


        // Return the created inventories
        return $inventories;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'color' => 'required|string',
            'engine' => 'required|string',
            'transmission' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'date_of_sale' => 'required|date',
        ]);


        $inventories = Inventory::findOrFail($id);


        // Update the inventories attributes
        $inventories->update($validatedData);


        return $inventories;
    }




    public function destroy($id)
    {
        // Logic to retrieve the specific inventories before deleting it
        $inventories = Inventory::findOrFail($id);


        // Store the data before deletion
        $deletedData = $inventories->toArray();


        // Delete the inventories
        $inventories->delete();


        // Return the deleted data in the response
        return response()->json(['message' => 'Inventory deleted successfully', 'deleted_data' => $deletedData]);
    }
}
