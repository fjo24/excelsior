<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'nombre', 'imagen', 'orden', 'ficha', 'contenido', 'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
