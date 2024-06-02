<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Price::with('article')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PriceRequest $request)
    {
        Price::create($request->validated());
        return response()->json(["message" => "price added!"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Price::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PriceRequest $request, string $id)
    {
        Price::find($id)->update($request->validated());
        return response()->json(["message" => "price updated!"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Price::find($id)->delete();
        return response()->json(["message" => "price deleted!"]);
    }
}
