<?php

namespace App\Http\Controllers;

use App\Models\PeliculaGenero;
use Illuminate\Http\Request;
use App\Http\Requests\PeliculaGeneroCreateRequest;

class PeliculaGeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeliculaGeneroCreateRequest $request)
    {
        $validated = $request->validated();
        $pelicula_genero = new PeliculaGenero();
        $pelicula_genero->create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeliculaGenero  $peliculaGenero
     * @return \Illuminate\Http\Response
     */
    public function show(PeliculaGenero $peliculaGenero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeliculaGenero  $peliculaGenero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeliculaGenero $peliculaGenero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeliculaGenero  $peliculaGenero
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeliculaGenero $peliculaGenero)
    {
        //
    }
}
