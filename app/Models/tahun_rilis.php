<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class tahun_rilis extends Model
{
    use HasFactory;
    public $fillable = ['tahun_rilis'];
    public $timestamps = true;

    public function movie()
    {
        return $this->hasMany(Movie::class, 'id_tahun_rilis');
    }
    public static function boot()
    {
        parent::boot();

        self::deleting(function($tahun_rilis){
            if ($tahun_rilis->movie->count() > 0) {
                Alert::error('Gagal Menghapus', 'Nama Tahun Rilis : ' .$tahun_rilis->tahun);
                return false;
            }
            Alert::success('Done', 'Data berhasil dihapus')->autoClose(2000);         
        });
    }        
}
