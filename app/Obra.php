<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table    = "obras";
    protected $fillable = [
        'titulo', 'subtitulo', 'tareas', 'categoria_obra_id',
    ];

    public function categoria_obra()
    {
        return $this->belongsTo('App\Categoria_obra');
    }

    public function obra_imagenes()
    {
        return $this->hasMany('App\Obra_imagen');
    }
}
