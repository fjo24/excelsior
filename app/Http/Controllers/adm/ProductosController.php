<?php

namespace App\Http\Controllers\adm;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductosRequest;
use App\Imgproducto;
use App\Producto;
use Illuminate\Http\Request;

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
        if ($request->hasFile('ficha')) {
            if ($request->file('ficha')->isValid()) {
                $file = $request->file('ficha');
                $path = public_path('img/producto/ficha/');
                $request->file('ficha')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->ficha = 'img/producto/ficha/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $producto->save();
        $id = $producto->id;
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/producto/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Imgproducto;
                $imagen->ubicacion   = 'img/producto/' . $id . '_' . $file->getClientOriginalName();
                $imagen->producto_id = $id;
                $imagen->save();
            }

        }
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
        if ($request->hasFile('ficha')) {
            if ($request->file('ficha')->isValid()) {
                $file = $request->file('ficha');
                $path = public_path('img/producto/ficha/');
                $request->file('ficha')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->ficha = 'img/producto/ficha/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $producto->save();
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/producto/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Imgproducto;
                $imagen->ubicacion   = 'img/producto/' . $id . '_' . $file->getClientOriginalName();
                $imagen->producto_id = $id;
                $imagen->save();
            }

        }
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

    //admin de imagenes
    public function imagen($id)
    {
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();

        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function nuevaimagen(Request $request, $id)
    {
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/producto/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Imgproducto;
                $imagen->ubicacion   = 'img/producto/' . $id . '_' . $file->getClientOriginalName();
                $imagen->producto_id = $id;
                $imagen->save();
            }

        }
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();

        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
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
