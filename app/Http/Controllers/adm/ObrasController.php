<?php

namespace App\Http\Controllers\adm;

use App\Categoria_obra;
use App\Http\Controllers\Controller;
use App\Http\Requests\ObrasRequest;
use App\Obra;
use App\Obra_imagen;

class ObrasController extends Controller
{
    public function index()
    {
        $obras = obra::orderBy('id', 'ASC')->get();
        return view('adm.obras.index', compact('obras'));
    }

    public function create()
    {
        $categorias = Categoria_obra::orderBy('titulo', 'ASC')->pluck('titulo', 'id')->all();
        return view('adm.obras.create', compact('categorias'));
    }

    public function store(ObrasRequest $request)
    {
        $obra                    = new Obra();
        $obra->titulo            = $request->titulo;
        $obra->subtitulo         = $request->subtitulo;
        $obra->tareas            = $request->tareas;
        $obra->categoria_obra_id = $request->categoria_obra_id;
        $obra->orden             = $request->orden;
        $id                      = Obra::all()->max('id');
        $id++;
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/obra/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Obra_imagen;
                $imagen->ubicacion   = 'img/obra/' . $id . '_' . $file->getClientOriginalName();
                $imagen->producto_id = $id;
                $imagen->save();
            }
        }

        $obras->save();
        return redirect()->route('obras.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categorias = Categoria_obra::orderBy('titulo', 'ASC')->pluck('titulo', 'id')->all();
        $obra   = Obra::find($id);
        return view('adm.obras.edit', compact('obra', 'categorias'));
    }

    public function update(ObrasRequest $request, $id)
    {
        $obra                    = Obra::find($id);
        $obra->titulo            = $request->titulo;
        $obra->subtitulo         = $request->subtitulo;
        $obra->tareas            = $request->tareas;
        $obra->categoria_obra_id = $request->categoria_obra_id;
        $obra->orden             = $request->orden;
        $id                      = Obra::all()->max('id');
        $id++;
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/obra/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Obra_imagen;
                $imagen->ubicacion   = 'img/obra/' . $id . '_' . $file->getClientOriginalName();
                $imagen->producto_id = $id;
                $imagen->save();
            }
        }

        $obra->save();
        return redirect()->route('obras.index');
    }

    public function destroy($id)
    {
        $obra = Obra::find($id);
        $obra->delete();
        return redirect()->route('obras.index');
    }

    public function imagenes($id)
    {
        $imagenes = Obra_imagen::orderBy('id', 'ASC')->Where('obra_id', $id)->get();

        $obra=Obra::find($id);
        return view('adm.obras.imagenes')->with(compact('imagenes', 'obra'));
    }

    public function nuevaimagen(Request $request, $id)
    {
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/obra/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen          = new Obra_imagen;
                $imagen->imagen  = 'img/obra/' . $id . '_' . $file->getClientOriginalName();
                $imagen->obra_id = $id;
                $imagen->save();
            }
        }
        $imagenes = Obra_imagen::orderBy('id', 'ASC')->Where('obra_id', $id)->get();

        $obra = Obra::find($id);
        return view('adm.obras.imagenes')->with(compact('imagenes', 'obra'));
    }

    public function destroyimg($id)
    {
        $imagen = Imgproducto::find($id);
        $idpro  = $imagen->producto_id;
        $imagen->delete();
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $idpro)->get();

        $producto = producto::find($idpro);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }
}
