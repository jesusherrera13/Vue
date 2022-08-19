<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "todos_comments";

    protected $fillable = ['todo_id', 'comment'];

    public function todo() {
        return $this->belongsTo(Todo::class);
    }
}
