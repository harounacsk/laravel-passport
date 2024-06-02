<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use Illuminate\Http\Request;

class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Depot::with(['articles'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);
        Depot::create($request->all());
        return response()->json(["message" => "depot added!"]);
    }

    /**
     * Display the specified resource.  
     */
    public function show(string $id)
    {
        return Depot::where('id', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Depot::find($id)->update($request->all());
        return response()->json(["message" => "depot updated!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Depot::find($id)->delete();
        return response()->json(["message" => "depot deleted!"]);
    }
}
