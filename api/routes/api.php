<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', 'api\AuthController@login');

Route::post('auth/refresh', 'api\AuthController@refresh');

Route::post('/cadastrar/produto', 'api\AuthController@create_produto');

Route::post('/cadastrar/cliente', 'api\AuthController@create_cliente');

Route::get('auth/logout', 'api\AuthController@logout');


Route::group(['middleware' => 'jwt.auth', 'namespace' => 'api\\'], function(){

    Route::get('auth/me' , 'AuthController@me');

});
