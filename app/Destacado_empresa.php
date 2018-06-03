<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destacado_empresa extends Model
{
    protected $table    = "destacado_empresas";
    protected $fillable = [
        'titulo', 'subtitulo', 'contenido', 'titulo2', 'subtitulo2', 'contenido2', 'imagen',
    ];
}
