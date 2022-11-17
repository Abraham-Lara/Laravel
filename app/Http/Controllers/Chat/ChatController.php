<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Post;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('chat', 'store');
    }


    public function chat()
    {
        $user = auth()->user()->id;

        $mensajes = Message::where('messages.user_id', $user)
            ->latest()->get();


        return view('chats._chat', ['mensaajes' => $mensajes]);
    }

    public function store(Post $post)
    {

        $servicio = $post->titulo;

        $mensaje = Message::create([

            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'mensaje' => request('mensaje'),


        ]);

        return redirect()->route('chat')
            ->with('service', $servicio);
    }



    public function chatRecibidos()
    {
        $user = auth()->user()->id;


        $mensajeR = Message::select('users.id', 'messages.mensaje', 'messages.created_at' )
            ->leftjoin('users', 'messages.post_id', '=', 'users.id')
            ->where('messages.post_id',$user)
            ->get();

        return view('chats._chatRecibido',['mensajeR' =>$mensajeR] );

    }
}






/**\AUt::userh 
 * 
 *   
 * 
 * chats belongs to
 */

 /**
  
 

  */
