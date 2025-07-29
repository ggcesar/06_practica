<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UsuariosController};

use App\Http\Controllers\{ProductoController};
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Logs
    //    Route::group(['middleware' => 'role:administrador'], function () {
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    //    });

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Roles
    Route::group(['as' => 'roles.'], function () {
        Route::get('rol-permisos/{id}', [\App\Http\Controllers\RolesController::class, 'permisos'])->name('rol-permisos');
        Route::post('rol-permisos/{id}', [\App\Http\Controllers\RolesController::class, 'permisosUpdate'])->name('update-rol-permisos');
    });

    // Recursos
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('permisos', \App\Http\Controllers\PermisosController::class)->except('show');
    Route::resource('roles', \App\Http\Controllers\RolesController::class)->except('show');

    Route::resource('productos', \App\Http\Controllers\ProductoController::class);
    Route::resource('categorias', \App\Http\Controllers\CategoriaController::class);
    Route::resource('clientes', \App\Http\Controllers\ClienteController::class);

    // Rutas para generar PDF de productos
    Route::get('/productospdf', [ProductoController::class, 'generarPDF'])->name('productos.pdf');

    //
    Route::get('/mensaje', [App\Http\Controllers\MensajeController::class, 'vista'])->name('mails.form');
    Route::post('/mensaje', [App\Http\Controllers\MensajeController::class, 'enviarMensaje'])->name('mensaje.enviar');

});
