<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\usuarioController;
use App\http\Controllers\contabancariaController;
use App\Http\Controllers\instituicaoController;
use Illuminate\Support\Facades\Route;

//pagina inicial 
Route::get('tributos/{id?}',                     [instituicaoController::class, 'index']);
Route::get('/tributos/telasenha/{instituicao}',  [homecontroller::class, 'paginalogon'])->name('telasenha');

//rotas Contabancaria
Route::get('/tributos/principal/contabancaria', [contabancariaController::class, 'index'])->name('indexcontabancaria');

//listar usuarios
Route::post('/tributos/principal/{instituicao}',     [usuarioController::class, 'logarSistema'])->name('logar');
Route::get('/tributos/principal/usuario_lista/{id?}', [usuarioController::class, 'lista'])->name('usuario.index_usuario_lista');
Route::post('tributos/principal/usuario_lista/{id?}',      [usuarioController::class, 'insert'])->name('usuario.insert');
Route::get('tributos/principal/usuario_novo',        [usuarioController::class, 'create'])->name('usuario.inserir');
Route::get('/tributos/principal/usuario/{id?}',      [usuarioController::class, 'index'])->name('usuario.index_usuario');
Route::get('/tributos/principal/usuario/{id?}/edit', [usuarioController::class, 'edit'])->name('usuario.edit_usuario');
Route::patch('tributos/principal/usuario_lista/{id?}', [usuarioController::class, 'editar'])->name('usuario.editar');
Route::delete('tributos/principal/usuario_lista/{id?}', [usuarioController::class, 'delete'])->name('usuario.delete');


//paginas modelo para o desenvolvimento
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
