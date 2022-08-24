<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\CategorieCreateRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Categorie::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieCreateRequest $request)
    {
        $validated = $request->validated();
        
        Categorie::create($validated);

        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categoria)
    {
        //
    }
}
