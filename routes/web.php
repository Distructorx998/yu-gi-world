<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('re' , 'App\Http\Controllers\HomeController@re' );

Route::post('re' ,'App\Http\Controllers\dbController@register')->name('signup');

Route::get('login' , 'App\Http\Controllers\HomeController@login' );

Route::post('login' , 'App\Http\Controllers\LoginController@log' )-> name('log');
Route::get('re/check/{field}' , 'App\Http\Controllers\HomeController@check' );



Route::get('home' , 'App\Http\Controllers\HomeController@home' );
Route::get('hw' , 'App\Http\Controllers\HomeController@hw' );
Route::get('about' , 'App\Http\Controllers\HomeController@about' );
Route::get('profilo' , 'App\Http\Controllers\HomeController@profilo' );
Route::get('logout' , 'App\Http\Controllers\LoginController@logout' );
Route::get('about' , 'App\Http\Controllers\HomeController@about' );
Route::get('gestione' , 'App\Http\Controllers\HomeController@gestione' );
Route::get('modifica_password' , 'App\Http\Controllers\HomeController@modifica_password' );
Route::post('exit' ,'App\Http\Controllers\fetchController@exit');


Route::get('elenco' ,'App\Http\Controllers\fetchController@elenco');
Route::get('fetch_database' ,'App\Http\Controllers\fetchController@fetch_database');
Route::get('deck' ,'App\Http\Controllers\fetchController@deck');
Route::get('fetch_deck' ,'App\Http\Controllers\fetchController@fetch_deck');
Route::get('totale' ,'App\Http\Controllers\fetchController@totale');
Route::get('totale_database' ,'App\Http\Controllers\fetchController@totale_database');
Route::get('delete_deck','App\Http\Controllers\fetchController@delete_deck');
Route::get('delete_all','App\Http\Controllers\fetchController@delete_all');
Route::get('delete','App\Http\Controllers\fetchController@delete');
Route::get('delete_database','App\Http\Controllers\fetchController@delete_database');
Route::get('utente','App\Http\Controllers\fetchController@utente');
Route::get('elimina_utente','App\Http\Controllers\fetchController@elimina_utente');
Route::get('checkID','App\Http\Controllers\fetchController@checkID');
Route::get('check_password','App\Http\Controllers\HomeController@check_password');
Route::post('change_password','App\Http\Controllers\HomeController@change_password');


Route::get('nome' , 'App\Http\Controllers\fetchController@nome' );
Route::get('tipo' , 'App\Http\Controllers\fetchController@tipo' );
Route::get('tipologia' , 'App\Http\Controllers\fetchController@tipologia' );
Route::get('livello' , 'App\Http\Controllers\fetchController@livello' );
Route::get('archetipo' , 'App\Http\Controllers\fetchController@archetipo' );
Route::get('all' , 'App\Http\Controllers\fetchController@all' );
Route::get('attributo' , 'App\Http\Controllers\fetchController@attributo' );
?>