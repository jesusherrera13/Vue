<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\PeliculaGenero;
use Illuminate\Http\Request;
use App\Http\Requests\PeliculaCreateRequest;
use App\Http\Requests\PeliculaUpdateRequest;
use App\Http\Requests\PeliculaGeneroCreateRequest;
use App\Http\Requests\PeliculaGeneroUpdateRequest;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pelicula::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeliculaCreateRequest $request)
    {
        $validated = $request->validated();
        //$pelicula = new Pelicula();
        $pelicula = Pelicula::create($validated);
        $pelicula->create($validated);

        $this->generos($pelicula->id, $request);

        /*
        if(sizeof($request->generos)) {

            $r = [];

            foreach($request->generos as $genero_id) {

                $pelicula_genero = PeliculaGenero::where(['pelicula_id' => $pelicula->id, 'genero_id' => $genero_id])->get();

                $row = new PeliculaGenero();

                if(sizeof($pelicula_genero)) {
                    $r = $pelicula_genero;
                    $r =['pelicula_id' => $pelicula->id,'genero_id' => $genero_id];
                }
                else {

                    $rick = new PeliculaGeneroCreateRequest();
                    
                    $rick->replace([
                        'pelicula_id' => $pelicula->id,
                        'genero_id' => $genero_id,
                    ]);

                    //$validated = $rick->validated();

                    //$row->create($validated);
                    $row->create($rick->all());
                    // app(PeliculaGeneroController::class)->store($rick);

                    // PeliculaGenero::create($rick);
                    // $r = $rick;
                }
            }

            // return response()->json(['message' => 'Created'], 201);
        }
        */

        return response()->json(['message' => 'Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //$pelicula = Pelicula::with('generos')->where('id', $id)->get();
        $pelicula = Pelicula::with('generos')->find($id);
        return response()->json($pelicula);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(PeliculaUpdateRequest $request, Pelicula $pelicula)
    {
        $validated = $request->validated();
        $pelicula->update($validated);

        $this->generos($pelicula->id, $request);

        // $pelicula_genero = new PeliculaGenero();
        // $pelicula_genero
        // PeliculaGenero::where('id' => $request->id)->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        //
    }

    private function generos($id, Request $request) {

        if(sizeof($request->generos)) {

            foreach($request->generos as $genero_id) {

                $pelicula_genero = PeliculaGenero::where(['pelicula_id' => $id, 'genero_id' => $genero_id])->get();

                $row = new PeliculaGenero();

                if(sizeof($pelicula_genero)) {
                    $r = $pelicula_genero;
                    $r =['pelicula_id' => $id,'genero_id' => $genero_id];
                }
                else {

                    $rick = new PeliculaGeneroCreateRequest();
                    
                    $rick->replace([
                        'pelicula_id' => $id,
                        'genero_id' => $genero_id,
                    ]);

                    //$validated = $rick->validated();

                    //$row->create($validated);
                    $row->create($rick->all());
                    // app(PeliculaGeneroController::class)->store($rick);

                    // PeliculaGenero::create($rick);
                    // $r = $rick;
                }
            }

            // return response()->json(['message' => 'Created'], 201);
        }
    }
}
