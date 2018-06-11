<?php

namespace App\Http\Controllers\adm;
use App\Dato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacto;

class ContactoController extends Controller
{
    public function index(){
    	return view('pages.contacto');
    }

    public function enviarMail(Request $request) {
        $datos = Dato::where('tipo', 'email')->first();

        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $email = $request->input('email');
        $empresa = $request->input('empresa');
        $mensaje = $request->input('mensaje');

        Mail::to($datos->descripcion)->send(new Contacto($nombre, $apellido,$empresa,$email,$mensaje));

        if (count(Mail::failures()) > 0) {
            $success = 'Ha ocurrido un error al enviar el correo';
        }else{
            $success = 'Correo enviado correctamente';
        }

        return back()->with('success', $success);
    }
}
