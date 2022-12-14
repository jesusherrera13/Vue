<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'done', 'categorie_id'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}