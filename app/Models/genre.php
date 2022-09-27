<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class genre extends Model
{
    use HasFactory; 
    public $fillable = ['kategori'];
    public $timestamps = true;
    public $table = 'genres';

    public function movie()
    {
        return $this->hasMany(Movie::class, 'id_genre');
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function($genre){
            if ($genre->movie->count() > 0) {
                Alert::error('Gagal Menghapus', 'Nama Genre : ' .$genre->kategori);
                return false;
            }

        });
    }
}