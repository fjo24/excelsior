<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Categoria;
use App\Categoria_obra;
use App\Dato;
use App\Destacado_home;
use App\Destacado_mantenimiento;
use App\imgproducto;
use App\Obra;
use App\Producto;
use App\Consejo;
use App\Servicio;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaginasController extends Controller
{
    public function home()
    {
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'home')->get();
        $servicios = Servicio::OrderBy('orden', 'ASC')->get();
        $banner    = Banner::all()->first();
        $contenido = Destacado_home::all()->first();
        return view('pages.home', compact('sliders', 'servicios', 'banner', 'contenido'));
    }

    public function mantenimiento()
    {
        $servicios = Servicio::OrderBy('orden', 'ASC')->get();
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'mantenimiento')->get();
        $contenido = Destacado_mantenimiento::all()->first();
        return view('pages.mantenimiento', compact('sliders', 'servicios', 'contenido'));
    }

    public function categorias()
    {
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.categorias', compact('categorias'));
    }

    public function productos($id)
    {
        $categoria = Categoria::find($id);
        $ready     = 0;
        $productos = Producto::OrderBy('orden', 'asc')->where('categoria_id', $id)->get();
        return view('pages.productos', compact('productos', 'categoria', 'ready'));
    }

    public function empresa()
    {
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'empresa')->get();
        $contenido = Contenidoempresa::all()->first();
        return view('pages.empresa', compact('sliders', 'contenido'));
    }

    public function productoinfo($id)
    {
        $imagenes  = Imgproducto::OrderBy('ubicacion', 'ASC')->where('producto_id', '$id')->get();
        $producto  = Producto::find($id);
        $idc       = $producto->categoria_id;
        $categoria = Categoria::find($idc);
        $guia      = 0;
        $ready     = 0;

        return view('pages.productoinfo', compact('producto', 'categoria', 'imagenes'));

    }

    public function categoriaobras()
    {
        $obras = Categoria_obra::OrderBy('orden', 'asc')->get();
        return view('pages.catobras', compact('obras'));
    }

    public function obras($id)
    {
        $categoria = Categoria::find($id);
        $ready         = 0;
        $obras     = Obra::OrderBy('orden', 'ASC')->where('categoria_obra_id', $id)->get();
        return view('pages.obras', compact('obras','ready', 'categoria'));
    }

    public function modeloinfo($id)
    {
        $modelo        = Modelo::find($id);
        $categorias    = Categoria::OrderBy('orden', 'asc')->get();
        $producto      = Producto::find($modelo->producto_id);
        $idc           = $producto->categoria_id;
        $ready         = 0;
        $vidrio1       = Tipovidrio::find(1);
        $vidrio2       = Tipovidrio::find(2);
        $imgtipos      = Imgtipo::OrderBy('id', 'asc')->get();
        $imgvidrio     = Imgvidrio::OrderBy('id', 'asc')->get();
        $categoria     = Categoria::find($idc);
        $tipos_ventana = Tipoventana::OrderBy('orden', 'asc')->get();
        return view('pages.modeloinfo', compact('producto', 'categoria', 'modelo', 'categorias', 'tipos_ventana', 'ready', 'imgtipos', 'vidrio1', 'vidrio2', 'imgvidrio'));
    }

    public function servicios()
    {
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'servicios')->get();
        $servicios = Servicio::OrderBy('id', 'ASC')->get();
        return view('pages.servicios', compact('sliders', 'servicios'));
    }

    public function obrainfo($id)
    {
        $obra    = Obra::find($id);
        $sliders = Slider::orderBy('id', 'ASC')->Where('seccion', 'obras')->get();
        return view('pages.obrainfo', compact('obra', 'sliders'));
    }

    public function fabrica()
    {
        $fabrica = Fabrica::all()->first();
        $sliders = Slider::orderBy('id', 'ASC')->Where('seccion', 'fabrica')->get();
        return view('pages.fabrica', compact('fabrica', 'sliders'));
    }

    public function presupuesto()
    {
        $sliders = Slider::orderBy('id', 'ASC')->Where('seccion', 'presupuesto')->get();
        return view('pages.presupuesto', compact('sliders'));
    }

    public function enviarpresupuesto(Request $request)
    {
        $sliders   = Slider::orderBy('id', 'ASC')->Where('seccion', 'presupuesto')->get();
        $nombre    = $request->nombre;
        $mail      = $request->mail;
        $localidad = $request->localidad;
        $tel       = $request->tel;
        $detalle   = $request->detalle;
        $medida    = $request->medida;

        $newid = producto::all()->max('id');
        $newid++;

        if ($request->hasFile('archivo')) {
            if ($request->file('archivo')->isValid()) {
                $file = $request->file('archivo');
                $path = public_path('img/archivos/');
                $request->file('archivo')->move($path, $newid . '_' . $file->getClientOriginalName());
                $archivo = 'img/archivos/' . $newid . '_' . $file->getClientOriginalName();

            }
        }

        Mail::send('pages.emails.presupuestomail', ['nombre' => $nombre, 'tel' => $tel, 'mail' => $mail, 'localidad' => $localidad, 'detalle' => $detalle, 'medida' => $medida], function ($message) use ($archivo) {

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Excelsior');

            $message->to($dato->descripcion);

            //Attach file
            $message->attach($archivo);

            //Add a subject
            $message->subject("Presupuesto");

        });
        if (Mail::failures()) {
            return view('pages.presupuesto');
        }
        return view('pages.presupuesto');
    }

    public function contacto()
    {
        return view('pages.contacto');
    }

    public function consejos()
    {
        $consejos = Consejo::orderBy('orden', 'ASC')->get();
        return view('pages.consejos', compact('consejos'));
    }


    public function enviarmail(Request $request)
    {

        $dato     = Dato::where('tipo', 'mail')->first();
        $nombre   = $request->nombre;
        $apellido = $request->apellido;
        $empresa  = $request->empresa;
        $email    = $request->email;
        $mensaje  = $request->mensaje;

        Mail::send('pages.emails.contactomail', ['nombre' => $nombre, 'apellido' => $apellido, 'empresa' => $empresa, 'email' => $email, 'mensaje' => $mensaje], function ($message) {

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Excelsior');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject("Contacto");

        });
        if (Mail::failures()) {
            return view('pages.contacto');
        }
        return view('pages.contacto');
    }

}
