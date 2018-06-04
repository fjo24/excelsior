<?php

namespace App\Http\Controllers\adm;

use App\Banner;
use App\Destacado_home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('adm.dashboard');
    }

    public function create()
    {
        $home = Destacado_home::all()->first();
        return redirect()->route('home.edit', $home->id);
    }

    public function edit($id)
    {
        $home = Destacado_home::find($id);
        return view('adm.home.edit')
            ->with('home', $home);
    }

    public function update(Request $request, $id)
    {
        $dato            = Destacado_home::find($id);
        $dato->titulo    = $request->titulo;
        $dato->subtitulo = $request->subtitulo;
        $dato->contenido = $request->contenido;
        $dato->link      = $request->link;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/home/destacado/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $dato->imagen = 'img/home/destacado/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $dato->update();

        return view('adm.dashboard');
    }

    //EDITAR BANNER

    public function banner()
    {
        $banner = Banner::all()->first();
        return redirect()->route('banneredit', $banner->id);
    }

    public function banneredit($id)
    {
        $banner = Banner::find($id);
        return view('adm.home.banneredit')
            ->with('banner', $banner);
    }

    public function bannerupdate(Request $request, $id)
    {
        $dato         = Banner::find($id);
        $dato->texto  = $request->texto;
        $dato->texto2 = $request->texto2;
        $dato->texto3 = $request->texto3;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/home/banner/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $dato->imagen = 'img/home/banner/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $dato->update();

        return view('adm.dashboard');
    }
}
