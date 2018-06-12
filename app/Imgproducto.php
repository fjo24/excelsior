<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imgproducto extends Model
{
    protected $table    = "imgproductos";
    protected $fillable = [
        'ubicacion', 'producto_id',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Producto');
    }
}
