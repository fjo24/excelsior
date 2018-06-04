<?php

namespace App\Http\Controllers\adm;

use App\Destacado_mantenimiento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MantenimientosController extends Controller
{

    public function create()
    {
        $dato = Destacado_mantenimiento::all()->first();
        return redirect()->route('mantenimientos.edit', $dato->id);
    }

    public function edit($id)
    {
        $dato = Destacado_mantenimiento::find($id);
        return view('adm.mantenimientos.edit')
            ->with('dato', $dato);
    }

    public function update(Request $request, $id)
    {
        $dato            = Destacado_mantenimiento::find($id);
        $dato->titulo    = $request->titulo;
        $dato->subtitulo = $request->subtitulo;
        $dato->contenido = $request->contenido;
        $dato->link      = $request->link;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/mantenimiento/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $dato->imagen = 'img/mantenimiento/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $dato->update();

        return view('adm.dashboard');
    }
}
