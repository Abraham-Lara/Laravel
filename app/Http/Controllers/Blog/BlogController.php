<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\createPostRequest;
use App\Models\Post;
use App\Models\Sala;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('blog', 'post');
    }

    //Listar de la DB
    public function blog()
    {
        $usuarioA= auth()->user()->id;
        $posts = Post::where('posts.user_id','<>',$usuarioA)
        ->latest()->get();
        return view('posts.blog', ['posts' => $posts]);
    }

    public function servicios()
    {
        $usuarioA= auth()->user()->id;
        $posts = Post::where('posts.user_id','=',$usuarioA)
        ->latest()->get();
        return view('posts.servicios', ['posts' => $posts]);
    }

    



    //Post en especifico
    public function post(Post $post)
    {
        return view('posts.post', ['post' => $post]);
    }


    public function postUser(Post $post)
    {
        return view('posts.miPost', ['post' => $post]);
    }



    public function crear(Post $post)
    {
        return view('posts.crear', ['post' => $post]);
    }

    public function store(createPostRequest $requestvalidate)
    {
        $usuarioA= auth()->user()->id;
        $requestvalidate->validated();
        Post::create([
            'user_id' => $usuarioA,
            'titulo' => $title = request('titulo'),
            'enlace' => Str::slug($title),
            'cuerpo' => request('cuerpo'),

        ]);

        return redirect()->route('blog');
    }

    public function editar(Post $post)
    {
        return view('posts.editar', ['post' => $post]);
    }

    public function update(Post $post, createPostRequest $requestvalidate)
    {
        $requestvalidate->validated();
        $post->update([

            'titulo' => $title = request('titulo'),

            'enlace' => Str::slug($title),
            'cuerpo' => request('cuerpo')
        ]);

        return redirect()->route('blog');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('blog');
    }

}
