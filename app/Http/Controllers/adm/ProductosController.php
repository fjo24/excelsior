<?php

namespace App\Http\Controllers\adm;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductosRequest;
use App\Producto;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = producto::orderBy('categoria_id', 'ASC')->get();
        return view('adm.productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.productos.create', compact('categorias'));
    }

    public function store(ProductosRequest $request)
    {
        $producto               = new Producto();
        $producto->nombre       = $request->nombre;
        $producto->orden        = $request->orden;
        $producto->ficha        = $request->ficha;
        $producto->contenido    = $request->contenido;
        $producto->categoria_id = $request->categoria_id;
        $id                     = Producto::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/producto/imagen/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->imagen = 'img/producto/imagen/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        if ($request->hasFile('ficha')) {
            if ($request->file('ficha')->isValid()) {
                $file = $request->file('ficha');
                $path = public_path('img/producto/ficha/');
                $request->file('ficha')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->ficha = 'img/producto/ficha/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $producto->save();
        return redirect()->route('productos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $producto   = Producto::find($id);
        return view('adm.productos.edit', compact('producto', 'categorias'));
    }

    public function update(ProductosRequest $request, $id)
    {
        $producto            = Producto::find($id);
        $producto->nombre    = $request->nombre;
        $producto->orden     = $request->orden;
        $producto->ficha     = $request->ficha;
        $producto->contenido = $request->contenido;
        $id                  = Producto::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/producto/imagen/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->imagen = 'img/producto/imagen/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        if ($request->hasFile('ficha')) {
            if ($request->file('ficha')->isValid()) {
                $file = $request->file('ficha');
                $path = public_path('img/producto/ficha/');
                $request->file('ficha')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->ficha = 'img/producto/ficha/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $producto->save();
        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $producto = producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function downloadPdf($id)
    {
        $producto = Producto::find($id);
        $path     = public_path();
        $url      = $path . '/' . $producto->ficha;
        return response()->download($url);
        return redirect()->route('productos.index');
    }
}
