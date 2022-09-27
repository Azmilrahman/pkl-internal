<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahun_rilis extends Model
{
    use HasFactory;
    public $fillable = ['tahun_rilis'];
    public $timestamps = true;

    public function movie()
    {
        return $this->hasMany(Movie::class, 'id_tahun_rilis');
    }
}
