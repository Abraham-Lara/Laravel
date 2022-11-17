<?php

use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\SalasVistaController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Chat\SalaController;
use App\Http\Controllers\PageController;

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Rote:get         | Consultar
| Rote:post        | Guardar
| Rote:delete      | Eliminar
| Rote:put         | Actualizar
*/


Route::controller(PageController::class)->group(function () {
    Route::get('/',               'home')->name('home');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('blog',            'blog')->name('blog');

    Route::get('post/crear',   'crear')->name('create');
    Route::post('blog',       'store')->name('crear-post');

    Route::get('post/{post:enlace}/editar',          'editar') ->name('editar'); 
    Route::patch('post/{post:enlace}',               'update')->name('update-post');

    Route::delete('post/{post:enlace}',              'destroy')->name('eliminar');


    Route::get('post/{post:enlace}',     'post')->name('post');
    
});

Route::controller(ChatController::class)->group(function(){
    Route::get('chat',                                      'chat')->name('chat');
    Route::post('enviarMensaje/{post:id}',              'store')->name('sendMessage');
    Route::get('chat/recibido',              'chatRecibidos')->name('chatRec');


});


Auth::routes([]);


