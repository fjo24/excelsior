<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('seccion', 'ASC')->paginate(10);
        return view('adm.sliders.index')
            ->with('sliders', $sliders);
    }

    //sliders para home
    public function homeslider(Request $request)
    {
        $slider = Slider::orderBy('seccion', 'ASC')->where('seccion', 'home')->paginate(7);
        return view('adm.sliders.index')
            ->with('sliders', $sliders);
    }

    public function create()
    {
        $seccion = "home";
        return view('adm.sliders.create')
            ->with('seccion', $seccion);
    }

    public function store(SliderRequest $request)
    {
        $slider          = new Slider();
        $slider->texto   = $request->texto;
        $slider->texto2  = $request->texto2;
        $slider->link    = $request->link;
        $slider->orden   = $request->orden;
        $slider->seccion = $request->seccion;
        $id              = Slider::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/slider/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $slider->imagen = 'img/slider/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $slider->save();

        return redirect()->route('sliders.index');

    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('adm.sliders.edit')
            ->with('slider', $slider);
    }
    public function show($id)
    {

    }

    public function update(SliderRequest $request, $id)
    {
        $slider          = Slider::find($id);
        $id              = Slider::all()->max('id');
        $slider->texto   = $request->texto;
        $slider->texto2  = $request->texto2;
        $slider->link    = $request->link;
        $slider->orden   = $request->orden;
        $slider->seccion = $request->seccion;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/slider/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $slider->imagen = 'img/slider/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $slider->update();
        return redirect()->route('sliders.index');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        //flash('Se ha eliminado correctamente.')->success()->important();
        return redirect()->route('sliders.index');
    }
}
