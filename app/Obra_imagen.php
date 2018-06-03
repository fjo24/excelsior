<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra_imagen extends Model
{
    protected $table    = "obra_imagenes";
    protected $fillable = [
        'imagen', 'obra_id',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
