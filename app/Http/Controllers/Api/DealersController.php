<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dealer;

class DealersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Dealer::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'inventory_id' => 'required|exists:inventories,inventory_id'
        ]);


        $dealers = Dealer::create([
            'name' => $validatedData['name'],
            'inventory_id' => $validatedData['inventory_id'],
        ]);


        return $dealers;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'inventory_id' => 'required|exists:inventories,inventory_id'
        ]);


        $dealers = Dealer::findOrFail($id);


        $dealers->update($validatedData);


        return $dealers;
    }




    public function destroy($id)
    {
        $dealers = Dealer::findOrFail($id);


        $deletedData = $dealers->toArray();


        $dealers->delete();


        // Return the deleted data in the response
        return response()->json(['message' => 'Dealer deleted successfully', 'deleted_data' => $deletedData]);
    }
}
