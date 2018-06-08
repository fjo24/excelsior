<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Contenidoempresa;
use App\Empresa;
use App\Fabrica;
use App\Home;
use App\Imgproducto;
use App\Imgtipo;
use App\Imgvidrio;
use App\Mail\sendmail;
use App\Modelo;
use App\Obra;
use App\Producto;
use App\Servicio;
use App\Slider;
use App\Tipoventana;
use App\Tipovidrio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

//use Mail;

class PaginasController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function empresa()
    {
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'empresa')->get();
        $contenido = Contenidoempresa::all()->first();
        return view('pages.empresa', compact('sliders', 'contenido'));
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

    public function productoinfo($id)
    {
        $imagenes   = Imgproducto::OrderBy('ubicacion', 'ASC')->where('producto_id', '$id')->get();
        $producto   = Producto::find($id);
        $idc        = $producto->categoria_id;
        $categoria  = Categoria::find($idc);
        $guia       = 0;
        $ready      = 0;
        $modelos    = Modelo::OrderBy('orden', 'ASC')->Where('producto_id', $id)->get();
        $imgmodelos = Imgproducto::OrderBy('ubicacion', 'ASC')->get();
        foreach ($modelos as $modelo) {
            if (isset($modelo)) {
                $guia = 1;
                break;
            }
        }
        if ($guia == 0) {
            return view('pages.productoinfo', compact('producto', 'categoria', 'imagenes'));
        } else {
            return view('pages.modelos', compact('producto', 'categoria', 'modelos', 'imgmodelos', 'ready'));
        }
    }

    public function modelos($id)
    {
        $producto  = Producto::find($id);
        $ready     = 0;
        $categoria = Categoria::find($producto->categoria_id);
        $modelos   = Modelo::OrderBy('orden', 'asc')->where('producto_id', $id)->get();
        return view('pages.modelos', compact('producto', 'modelos', 'categoria', 'ready'));
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

    public function obra()
    {
        $obras   = Obra::OrderBy('id', 'ASC')->get();
        $sliders = Slider::orderBy('id', 'ASC')->Where('seccion', 'obras')->get();
        return view('pages.obra', compact('obras', 'sliders'));
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

            $dato = Empresa::where('tipo', 'mail')->first();
            $message->from($dato->descripcion, 'Aberturas Tolosa');

            $message->to($dato->descripcion);

            //Attach file
            $message->attach($archivo);

            //Add a subject
            $message->subject("Presupuesto");

        });
        if (Mail::failures()) {
            flash('Ha ocurrido un error.')->error()->important();
            return view('pages.presupuesto');
        }
        flash('El mensaje se ha enviado exitosamente.')->success()->important();
        return view('pages.presupuesto', compact('sliders'));
    }

    public function contacto()
    {
        return view('pages.contacto');
    }

    public function enviarmail(Request $request)
    {

        $dato     = Empresa::where('tipo', 'mail')->first();
        $nombre   = $request->nombre;
        $apellido = $request->apellido;
        $empresa  = $request->empresa;
        $email    = $request->email;
        $mensaje  = $request->mensaje;

        Mail::to($dato->descripcion)->send(new sendmail($nombre, $apellido, $empresa, $mensaje, $email));
        if (Mail::failures()) {
            flash('Ha ocurrido un error.')->error()->important();
            return view('pages.contacto');
        }
        flash('El mensaje se ha enviado exitosamente.')->success()->important();
        return view('pages.contacto');
    }

}
