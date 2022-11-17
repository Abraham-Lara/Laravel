<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Sala;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('crear','store');
    }

   

    public function store(Post $post)
    {
        
        $sala = $post->id;
        $usuario = auth()->user()->id;
        $nombre = $post->titulo;

        $sala = Sala::create([
            'user_id'=>$usuario,
            'post_id' =>$sala,
            'nombre_sala' => $nombre
        ]);

        return view('salas.crear', ['sala' => $sala]);
     
    }

  
}
