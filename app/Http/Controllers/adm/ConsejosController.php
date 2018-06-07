<?php

namespace App\Http\Controllers\adm;

use App\Consejo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConsejosRequest;

class ConsejosController extends Controller
{
    public function index()
    {
        $consejos = Consejo::orderBy('id', 'ASC')->get();
        return view('adm.consejos.index', compact('consejos'));
    }

    public function create()
    {
        return view('adm.consejos.create');
    }

    public function store(ConsejosRequest $request)
    {
        $consejo         = new Consejo();
        $consejo->titulo = $request->titulo;
        $consejo->texto1 = $request->texto1;
        $consejo->texto2 = $request->texto2;
        $consejo->orden  = $request->orden;
        $id              = consejo::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/consejo/imagen/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $consejo->imagen = 'img/consejo/imagen/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $consejo->save();
        return redirect()->route('consejos.index');
    }

    public function edit($id)
    {
        $consejo = Consejo::find($id);
        return view('adm.consejos.edit', compact('consejo'));
    }

    public function update(ConsejosRequest $request, $id)
    {
        $consejo         = Consejo::find($id);
        $consejo->titulo = $request->titulo;
        $consejo->texto1 = $request->texto1;
        $consejo->texto2 = $request->texto2;
        $consejo->orden  = $request->orden;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/consejo/imagen/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $consejo->imagen = 'img/consejo/imagen/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $consejo->save();
        return redirect()->route('consejos.index');
    }

    public function destroy($id)
    {
        $consejo = Consejo::find($id);
        $consejo->delete();
        return redirect()->route('consejos.index');
    }

}
