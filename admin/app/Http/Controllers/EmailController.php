<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class EmailController extends Controller
{
    //
    public function send(Request $request)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'motivo' => $request->input('motivo'),
            'message' => $request->input('message')];

        Mail::send('emails.send', [
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'phone' => $dados['phone'],
            'motivo' => $dados['motivo'],
            'content' => $dados['message'],
        ], function ($message) {
            
            $message->subject('[IPVTran] [Site] Contato');
            $message->from('luizhrqas@gmail.com', 'IPVTran Contato');

            $message->to('luizhrqas@gmail.com');

        });

        return response()->json(['message' => 'Request completed']);
    }
}
