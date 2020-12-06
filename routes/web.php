<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\usuarioController;
use App\http\Controllers\contabancariaController;
use App\Http\Controllers\instituicoeController;
use Illuminate\Support\Facades\Route;

//pagina inicial 
Route::get('/tributos/telasenha/{instituicao}',  [homecontroller::class, 'paginalogon'])->name('telasenha');

//Rotas Contabancaria
Route::post('/tributos/principal/contabancaria', [contabancariaController::class, 'index'])->name('indexcontabancaria');

//Rotas usuarios
Route::post('tributos/principal/{instituicao}',       [usuarioController::class, 'logarSistema'])->name('logar');
Route::post('tributos/principal/usuario/{id?}',  [usuarioController::class, 'insert'])->name('usuario.insert');
Route::get('tributos/principal/usuario_novo',          [usuarioController::class, 'create'])->name('usuario.inserir');
Route::get('tributos/principal/usuario/{id?}',        [usuarioController::class, 'index'])->name('usuario.index_usuario');
Route::get('tributos/principal/usuario/{id?}/edit',   [usuarioController::class, 'edit'])->name('usuario.edit_usuario');
Route::patch('tributos/principal/usuario/{id?}/edit', [usuarioController::class, 'editar'])->name('usuario.editar');
Route::delete('tributos/principal/usuario/{id?}/delete',   [usuarioController::class, 'delete'])->name('usuario.delete');



//Rotas Instituições
Route::get('tributos/{id?}',                                [instituicoeController::class, 'index']);
Route::get('/tributos/principal/instituicao_lista/{id?}',   [instituicoeController::class, 'lista'])->name('instituicao.index_instituicao_lista');
Route::post('tributos/principal/instituicao_lista/{id?}',   [instituicoeController::class, 'insert'])->name('instituicao.insert');
Route::get('tributos/principal/instituicao_nova',           [instituicoeController::class, 'create'])->name('instituicao.inserir');
Route::get('/tributos/principal/instituicao/{id?}/edit',    [instituicoeController::class, 'edit'])->name('instituicao.edit_instituicao');
Route::patch('tributos/principal/instituicao_lista/{id?}',  [instituicoeController::class, 'editar'])->name('instituicao.editar');
Route::delete('tributos/principal/instituicao_lista/{id?}', [instituicoeController::class, 'delete'])->name('instituicao.delete');
Route::get('tributos/principal/{id?}/delete',               [instituicoeController::class, 'modal'])->name('instituicao.modal');

//paginas modelo para o desenvolvimento
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
