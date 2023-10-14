<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\RegistroController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//Route::get('/events', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/users/list',[RegistroController::class, 'index'])->name('listaDeUsuarios');
Route::get('/users/register', [RegistroController::class, 'create'])->name('formulario');//vista
Route::post('/register', [RegistroController::class, 'store'])->name('registro.store');
Route::get('/users/edit/{id}', [RegistroController::class, 'edit'])->name('editarUsuario');
Route::post('/users/update/{id}', [RegistroController::class, 'update'] )->name('actualizarUsuario');
Route::get('/users/destroy/{id}', [RegistroController::class, 'destroy'])->name('eliminarUsuario');