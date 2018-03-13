<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function submit(Request $request)
    {
        //Así se hacen validaciones sencillas
        $this->validate($request,[
           'name' => 'required|min:3',
           'email' => 'required|email'
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->input('email');
        $message->message = $request->message;

        $message->save();

        //->with() guarda en la session, aqui guardamos el mensaje en la sesion para mostrarlo en messages de partials
        return redirect('/')->with('success','Mensaje enviado');
    }

    public function getMessages()
    {
        $messages = Message::all();
        //return view('messages',['messages' => $messages]);
        return view('messages', compact('messages'));
    }
}
