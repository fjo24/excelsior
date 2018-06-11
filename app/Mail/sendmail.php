<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendmail extends Mailable
{
    use Queueable, SerializesModels;
public $nombre;
    public $email;
    public $empresa;
    public $mensaje;
    public $apellido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$apellido,$empresa,$mensaje,$email)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->empresa = $empresa;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pages.emails.contactomail')
            
            ->from('visitors@tolosa.com', 'Visita')
            ->subject('Contacto - cliente');
    }
}
