<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casting extends Model
{
    use HasFactory;
    public $fillable = ['nama', 'foto',
        'jenis_kelamin', 'tanggal_lahir'];
    public $timestamps = true;

    public function movie()
    {
        // model Casting bisa memiliki banyak data (n to n)
        // dari model Movie melalui table pivot(bantuan)
        // yang bernama 'movie_casting' dengan masing-masing        
        // fk id movie dan id_casting
        return $this->belongsToMany(Movie::class,
            'casting_movies', 'id_casting', 'id_movie');
    }
    public function image()
    {
        if ($this->foto && file_exists(public_path('images/casting/'
            . $this->foto))) {
            return asset('images/casting/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }
// mengahupus image(foto) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/casting/'
            . $this->foto))) {
            return unlink(public_path('images/casting/' . $this->foto));
        }
    }

    // public function movie()
    // {
    //     parent::boot();

    //     self::deleting(function($casting){
    //         if ($casting->movie->count() > 0) {
                // Alert::
    //             return false;
    //         }

    //     });

    //     return $this->hasMany(Movie::class, 'id_casting');
    // }
}