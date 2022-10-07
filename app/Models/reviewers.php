<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviewers extends Model
{
    use HasFactory;
    public $fillable = ['nama', 'foto', 'komentar', 'id_movie'];
    public $timestamps = true;
    
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'id_movie');
    }
}

