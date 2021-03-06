<?php

namespace App\Http\Controllers\adm;

use App\Dato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    public function index(Request $request)
    {
        $datos = Dato::orderBy('id', 'ASC')->get();
        return view('adm.datos.index')
            ->with('datos', $datos);
    }

    public function edit($id)
    {
        $dato = Dato::find($id);
        return view('adm.datos.edit')
            ->with('dato', $dato);
    }

    public function update(Request $request, $id)
    {
        $dato              = Dato::find($id);
        $dato->descripcion = $request->descripcion;
        $dato->save();

        return redirect()->route('datos.index');
    }
}
