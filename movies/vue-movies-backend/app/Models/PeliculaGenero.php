<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeliculaGenero extends Model
{
    use HasFactory;

    protected $table = "peliculas_generos";
    protected $fillable = ['pelicula_id', 'genero_id'];

    public function pelicula() {

        return $this->belongsTo(Pelicula::class);
    }
}
