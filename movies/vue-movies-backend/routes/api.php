<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\PeliculaController;

Route::resource('/actor', ActorController::class);
Route::resource('/genero', GeneroController::class);
Route::resource('/pelicula', PeliculaController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});