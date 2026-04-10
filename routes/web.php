<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//usar las rutas con los nombres de los metodos del controlador (Protegidos por el inicio de sesion)
Route::middleware(['auth'])->group(Function (){
Route::resource('usuario', UsuarioController::class);
Route::resource('maestro', MaestroController::class);
Route::resource('user', UserController::class)->except(['index']);

});

Route::get('/admin', [
    UserController::class, 'index'])
    ->name('admin-dashboard');

Route::get('/maestros', [
    MaestroController::class, 'index'
])->name('maestro.index');

//Ruta para el catalogo de usuarios
Route::get('/home',[
        UsuarioController::class, 'home'
])->name('home');

//Ruta para obtener la vista de la actualizacion
Route::get('/usuario/{id}/edit', [
    UsuarioController::class, 'edit'
])->name('usuario.edit');

//Ruta para actualizar el registro
Route::get('/usuario/{id}', [
    UsuarioController::class, 'update'
])->name('usuario.update');

//Ruta para regresar ala vista del resgitro
Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

//Ruta para guardar el registro del usuario
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

//Ruta para regresar a la vista del inicio de sesion
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

//Ruta para inicio de sesion
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

//Ruta para cerrar sesion
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');


Route::middleware(['auth', 'admin'])->group(function () {
    
    //RUTA PARA EL PANEL DE ADMNISTRADOR
    Route::get('/admin-dashboard', [
    AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');

    
});

Route::get('/auth/google', [
    GoogleController::class, 'redirect']);

Route::get('/auth/google/callback', [
    GoogleController::class, 'callback']);


