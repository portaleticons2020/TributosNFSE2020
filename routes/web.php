<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\usuarioController;
use App\http\Controllers\contabancariaController;
use App\Http\Controllers\instituicaoController;
use Illuminate\Support\Facades\Route;

//pagina inicial 
Route::get('/tributos/telasenha/{instituicao}',  [homecontroller::class, 'paginalogon'])->name('telasenha');

//Rotas Contabancaria
Route::get('/tributos/principal/contabancaria', [contabancariaController::class, 'index'])->name('indexcontabancaria');

//Rotas usuarios
Route::post('/tributos/principal/{instituicao}',       [usuarioController::class, 'logarSistema'])->name('logar');
Route::get('/tributos/principal/usuario_lista/{id?}',  [usuarioController::class, 'lista'])->name('usuario.index_usuario_lista');
Route::post('tributos/principal/usuario_lista/{id?}',  [usuarioController::class, 'insert'])->name('usuario.insert');
Route::get('tributos/principal/usuario_novo',          [usuarioController::class, 'create'])->name('usuario.inserir');
Route::get('/tributos/principal/usuario/{id?}',        [usuarioController::class, 'index'])->name('usuario.index_usuario');
Route::get('/tributos/principal/usuario/{id?}/edit',   [usuarioController::class, 'edit'])->name('usuario.edit_usuario');
Route::patch('tributos/principal/usuario_lista/{id?}', [usuarioController::class, 'editar'])->name('usuario.editar');
Route::delete('tributos/principal/usuario_lista/{id?}',[usuarioController::class, 'delete'])->name('usuario.delete');
Route::get('tributos/principal/{id?}/delete',          [usuarioController::class, 'modal'])->name('usuario.modal');


//Rotas Instituições
Route::get('tributos/{id?}',                           [instituicaoController::class, 'index']);
Route::get('/tributos/principal/instituicao_lista',    [instituicaoController::class, 'lista'])->name('instituicao.index_instituicao_lista');
Route::post('tributos/principal/instituicao_lista',    [instituicaoController::class, 'insert'])->name('instituicao.insert');
Route::get('tributos/principal/instituicao_nova',      [instituicaoController::class, 'create'])->name('instituicao.inserir');

//paginas modelo para o desenvolvimento
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
