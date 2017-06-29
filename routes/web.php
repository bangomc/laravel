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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('lancamentos', 'LancamentosController@index');
Route::get('lancamentos/add', 'LancamentosController@add');
Route::post('lancamentos/grv', 'LancamentosController@grv');
Route::get('lancamentos/{lancamento}/edt', 'LancamentosController@edt');
Route::patch('lancamentos/{lancamento}', 'LancamentosController@upd');
Route::delete('lancamentos/{lancamento}', 'LancamentosController@del');
