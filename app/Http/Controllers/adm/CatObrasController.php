<?php

namespace App\Http\Controllers\adm;

use App\Categoria_obra;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatobrasRequest;

class CatObrasController extends Controller
{
    public function index()
    {
        $categorias = Categoria_obra::orderBy('orden', 'ASC')->get();
        return view('adm.catobras.index', compact('categorias'));
    }

    public function create()
    {
        return view('adm.catobras.create');
    }

    public function store(CatobrasRequest $request)
    {
        $categoria         = new Categoria_obra();
        $categoria->titulo = $request->titulo;
        $categoria->orden  = $request->orden;
        $categoria->texto  = $request->texto;
        $id                = Categoria_obra::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/catobras/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $categoria->imagen = 'img/catobras/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $categoria->save();
        return redirect()->route('cat-obras.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categoria = Categoria_obra::find($id);
        return view('adm.catobras.edit', compact('categoria'));
    }

    public function update(CatobrasRequest $request, $id)
    {
        $categoria         = Categoria_obra::find($id);
        $id                = Categoria_obra::all()->max('id');
        $categoria->titulo = $request->titulo;
        $categoria->orden  = $request->orden;
        $categoria->texto  = $request->texto;
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/catobras/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $categoria->imagen = 'img/catobras/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $categoria->save();
        return redirect()->route('cat-obras.index');
    }

    public function destroy($id)
    {
        $categoria = Categoria_obra::find($id);
        $categoria->delete();
        return redirect()->route('cat-obras.index');
    }
}
