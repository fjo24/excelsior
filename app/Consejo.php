<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consejo extends Model
{
    protected $table    = "consejos";
    protected $fillable = [
        'titulo', 'texto1', 'texto2', 'imagen', 'orden',
    ];
}
