<?php

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
Route::get('/login', ['as' => 'login', 'uses' => 'ClienteController@login']);


Route::post('/login/auth', ['as' => 'login.entrar', 'uses' => 'ClienteController@auth']);

Route::get('/cliente/desconectar', ['as' => 'desconectar', 'uses' => 'ClienteController@desconectar']);

Route::get('/', ['as' => 'index', 'uses' => 'ClienteController@index'])->middleware(['login.check']);

Route::get('/produto/detalhe/{id}', ['as' => 'produto.detalhes', 'uses' => 'ClienteController@detalhe_produto'])->middleware(['login.check']);

Route::get('/fazer_pedido/{id}', ['as' => 'produto.pedido', 'uses' => 'ClienteController@fazer_pedido'])->middleware(['login.check']);

Route::get('/cliente/pedidos', ['as' => 'pedidos', 'uses' => 'ClienteController@pedidos'])->middleware(['login.check']);
Route::get('/cliente/perfil', ['as' => 'perfil', 'uses' => 'ClienteController@perfil'])->middleware(['login.check']);
