<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('adm.home.index');
    }
    public function create()
    {
        /*  $home = Home::all()->first();
    return redirect()->route('home.edit', $home->id);*/
    }
    public function edit($id)
    {
        /* $home = Home::find($id);
    return view('adm.home.edit')
    ->with('home', $home);*/
    }

    public function update(HomeRequest $request, $id)
    {
        /*   $dato            = Home::find($id);
    $dato->titulo    = $request->titulo;
    $dato->contenido = $request->contenido;
    $dato->link      = $request->link;
    $dato->save();

    flash('Se ha actualizado de forma exitosa')->success()->important();
    return redirect()->route('home.index');*/
    }
}
