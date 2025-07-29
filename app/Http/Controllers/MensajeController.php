<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MensajeRequest;
use Illuminate\Support\Facades\Mail;

class MensajeController extends Controller
{
    public function vista()
    {
        return view('mails.form');
    }

    public function enviarMensaje(MensajeRequest $request)
    {
        $datos = [
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'mensaje' => $request->input('mensaje'),
            'telefono' => $request->input('telefono'),
        ];
        Mail::send('mails.producto', $datos, function ($mensaje) use ($request) {
            $mensaje->to($request->email, $request->nombre)
            ->subject('Correo de bienvenida')
            ->from('cesargabino@gmail.com');
        });        
        return redirect('clientes')->with('mensaje', 'Correo enviado correctamente');

    }
}
