<?php

use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\ExceptionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;

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
    Route::get('servicio',     'servicios')->name('mi-servicios');

    Route::get('post/crear',   'crear')->name('create');
    Route::post('blog',       'store')->name('crear-post');

    Route::get('post/{post:enlace}/editar',          'editar') ->name('editar'); 
    Route::patch('post/{post:enlace}',               'update')->name('update-post');

    Route::delete('post/{post:enlace}',              'destroy')->name('eliminar');


    Route::get('post/{post:enlace}',     'post')->name('post');
    Route::get('post/{post:enlace}/servicio',     'postUser')->name('post-servicio');
    
});

Route::controller(ChatController::class)->group(function(){
    Route::get('chat',                                      'chat')->name('chat');
    Route::post('enviarMensaje/{post:id}',              'store')->name('sendMessage');
    Route::get('chat/recibido',              'chatRecibidos')->name('chatRec');


});

Route::group(['middleware' =>['auth']],function(){
    Route::resource('roles',RolController::class)->middleware('can:ver-rol');
    Route::resource('usuarios',UserController::class)->middleware('can:ver-user');
    

});


Auth::routes([]);


