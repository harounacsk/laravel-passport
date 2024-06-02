<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::with('depot')->get()->setVisible(["depot","name","id"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->validated());
        return response()->json(["message" => "article added!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Article::with(["depot"])->where('id', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        Article::find($id)->update($request->validated());
        return response()->json(["message" => "article updated!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::find($id)->delete();
        return response()->json(["message" => "article deleted!"]);
    }

    public function getPrices()
    {
        return Article::with(['prices'])->get()->setHidden(["price"]);
    }
}
