<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\FilmeController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home',[HomeController::class, 'index']);

//Recibos
Route::get('/recibos',[ReciboController::class,'index'])->middleware('auth')->name('recibos.ver');
Route::get('/recibos/comprar/{sessao}',[ReciboController::class,'create'])->middleware('auth')->name('recibos.create');
Route::post('/recibos/gerar',[ReciboController::class,'store'])->middleware('auth')->name('recibos.store');

Route::get('/set/cidade/{cidade}',[HomeController::class,'set_cidade'])->name('cidade.set');

//Cinemas
Route::get('/cinemas',[CinemaController::class,'index'])->middleware('auth')->name('cinemas.ver');
Route::get('/cinemas/novo',[CinemaController::class,'create'])->middleware('auth')->name('cinemas.create');
Route::post('/cinemas/salvar',[CinemaController::class,'store'])->middleware('auth')->name('cinemas.store');
Route::get('/cinemas/editar/{cinema}',[CinemaController::class,'edit'])->middleware('auth')->name('cinemas.edit');
Route::post('/cinemas/atualizar/{cinema}',[CinemaController::class,'update'])->middleware('auth')->name('cinemas.update');
Route::get('/cinemas/deletar/{cinema}',[CinemaController::class,'destroy'])->middleware('auth')->name('cinemas.destroy');

//Salas
Route::get('/salas/{cinema}',[SalaController::class,'index'])->middleware('auth')->name('salas.ver');
Route::get('/salas/novo/{cinema}',[SalaController::class,'create'])->middleware('auth')->name('salas.create');
Route::post('/salas/salvar',[SalaController::class,'store'])->middleware('auth')->name('salas.store');
Route::get('/salas/editar/{sala}',[SalaController::class,'edit'])->middleware('auth')->name('salas.edit');
Route::post('/salas/atualizar/{sala}',[SalaController::class,'update'])->middleware('auth')->name('salas.update');
Route::get('/salas/deletar/{sala}',[SalaController::class,'destroy'])->middleware('auth')->name('salas.destroy');

//Sesoes
Route::get('/sessoes/{cinema}',[SessaoController::class,'index'])->middleware('auth')->name('sessoes.ver');
Route::get('/sessoes/novo/{cinema}',[SessaoController::class,'create'])->middleware('auth')->name('sessoes.create');
Route::post('/sessoes/salvar',[SessaoController::class,'store'])->middleware('auth')->name('sessoes.store');
Route::get('/sessoes/editar/{sessao}',[SessaoController::class,'edit'])->middleware('auth')->name('sessoes.edit');
Route::post('/sessoes/atualizar/{sessao}',[SessaoController::class,'update'])->middleware('auth')->name('sessoes.update');
Route::get('/sessoes/deletar/{sessao}',[SessaoController::class,'destroy'])->middleware('auth')->name('sessoes.destroy');

//Filmes
Route::get('/filmes',[FilmeController::class,'index'])->middleware('auth')->name('filmes.ver');
Route::get('/filmes/novo',[FilmeController::class,'create'])->middleware('auth')->name('filmes.create');
Route::post('/filmes/salvar',[FilmeController::class,'store'])->middleware('auth')->name('filmes.store');
Route::get('/filmes/editar/{filme}',[FilmeController::class,'edit'])->middleware('auth')->name('filmes.edit');
Route::post('/filmes/atualizar/{filme}',[FilmeController::class,'update'])->middleware('auth')->name('filmes.update');
Route::get('/filmes/deletar/{filme}',[FilmeController::class,'destroy'])->middleware('auth')->name('filmes.destroy');
Route::get('/filmes/detalhes/{filme}',[FilmeController::class,'show'])->name('filmes.show');

