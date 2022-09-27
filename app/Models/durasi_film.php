<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class durasi_film extends Model
{
    use HasFactory;
    public $fillable = ['durasi'];
    public $timestamps = true;

}
