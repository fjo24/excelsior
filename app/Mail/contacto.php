<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($nombre,$apellido,$empresa,$email,$mensaje)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->empresa = $empresa;
        $this->mensaje = $mensaje;
        
    }

    public function build()
    {
        return $this->from('fjo22@gmail.com')->cc($this->email)->subject('Contacto - Tolosa')->view('pag.contacto', ['nombre'=>$this->nombre, 'apellido'=>$this->apellido, 'email'=>$this->email, 'empresa'=>$this->empresa, 'mensaje'=>$this->mensaje]);
    }
}