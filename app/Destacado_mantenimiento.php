<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destacado_mantenimiento extends Model
{
    protected $table    = "destacado_mantenimientos";
    protected $fillable = [
        'titulo', 'subtitulo', 'imagen', 'contenido', 'link',
    ];
}
