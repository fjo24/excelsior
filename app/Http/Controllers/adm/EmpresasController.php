<?php

namespace App\Http\Controllers\adm;

use App\Destacado_empresa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function create()
    {
        $dato = Destacado_empresa::all()->first();
        return redirect()->route('empresas.edit', $dato->id);
    }

    public function edit($id)
    {
        $dato = Destacado_empresa::find($id);
        return view('adm.empresas.edit')
            ->with('dato', $dato);
    }

    public function update(Request $request, $id)
    {
        $dato             = Destacado_empresa::find($id);
        $dato->titulo     = $request->titulo;
        $dato->subtitulo  = $request->subtitulo;
        $dato->contenido  = $request->contenido;
        $dato->titulo2    = $request->titulo2;
        $dato->subtitulo2 = $request->subtitulo2;
        $dato->contenido2 = $request->contenido2;
        $dato->link       = $request->link;
        $dato->video      = $request->video;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/empresas/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $dato->imagen = 'img/empresas/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $dato->update();

        return view('adm.dashboard');
    }
}
