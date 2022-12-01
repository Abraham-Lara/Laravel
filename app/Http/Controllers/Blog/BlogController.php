<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\createPostRequest;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    function __construnct()
    {
        $this->middleware('permission:ver-blog|crear-blog|editar-blog|borrar-blog')->only('index');
        $this->middleware('permission:crear-blog', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-blog', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-blog', ['only' => ['destroy']]);
    }

    public function blog()
    {
        $usuarioA = auth()->user()->id;
        $posts = Post::where('posts.user_id', '<>', $usuarioA)
            ->latest()->paginate(5);
        return view('posts.blog', ['posts' => $posts]);
    }

    public function servicios()
    {
        $usuarioA = auth()->user()->id;
        $posts = Post::where('posts.user_id', '=', $usuarioA)
            ->latest()->get();
        return view('posts.servicios', ['posts' => $posts]);
    }

    //Post en especifico
    public function post(Post $post)
    {
        return view('posts.post', ['post' => $post]);
    }

    //Autor post
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
        $usuarioA = auth()->user()->id;
        $requestvalidate->validated();
        try {
            Post::create([
                'user_id' => $usuarioA,
                'titulo' => $title = request('titulo'),
                'enlace' => Str::slug($title),
                'cuerpo' => request('cuerpo'),

            ]);
        } catch (\Throwable $th) {
            return back()->with('error', '¡Ocurrio un error al crear servicio!');
        }
        return redirect()->route('blog')->with('error', '¡Servicio creado con éxito!');
    }

    public function editar(Post $post)
    {
        return view('posts.editar', ['post' => $post]);
    }

    public function update(Post $post, createPostRequest $requestvalidate)
    {

        try {
            $requestvalidate->validated();
            $post->update([

                'titulo' => $title = request('titulo'),
                'enlace' => Str::slug($title),
                'cuerpo' => request('cuerpo')
            ]);
        } catch (\Throwable $th) {

            return back()->with('error', '¡Ocurrio un error al actualizar!');
        }

        return redirect()->route('blog');
    }

    public function destroy(Post $post)
    {
        try {

            $post->delete();
        } catch (\Throwable $e) {

            return back()->with('error', '¡Ocurrio un error intentar al eliminar!');
        }
        return redirect()->route('blog');
    }
}
