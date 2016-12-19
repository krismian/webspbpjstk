<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Komentar;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul', 'sifat_id', 'isi'
    ];

    public function komentar() {
        return $this->hasMany('App\Komentar')->orderBy('id','desc');
    }

    public function user() {
        return $this->belongsToMany('App\User');
    }

    public function gambar() {
        return $this->belongsToMany('App\Gambar');
    }
}
