<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = 'gambar';

    protected $fillable = [
        'image_name', 'image_path', 'image_path_thumb', 'filename'
    ];

}
