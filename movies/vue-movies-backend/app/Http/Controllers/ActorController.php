<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
use App\Http\Requests\ActorCreateRequest;
use App\Http\Requests\ActorUpdateRequest;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Actor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActorCreateRequest $request)
    {
        $validated = $request->validated();

        //$actor = new Actor();
        //$actor->nombre = $request['nombre'];
        //$actor->apellido1 = $request['apellido1'];
        //$actor->apellido2 = $request['apellido2'];

        //$actor->save();
        $actor = Actor::create($validated);

        return response()->json(
            [
                'message' => 'Actor guardado',
                'id' => $actor->id
            ]
        , 201);
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        return $actor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(ActorUpdateRequest $request, Actor $actor)
    {
        $validated = $request->validated();
        $actor->update($validated);

        return response()->json([
            'message' => 'Updated'
        ], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        //
    }
}
