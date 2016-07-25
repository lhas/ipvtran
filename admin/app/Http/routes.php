<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Redireciona para painel do Laravel
Route::get('/', function () {
    return Redirect::to('/panel');
});

// Contato
Route::post('/send', 'Api\EmailController@send');

// Inscrição
Route::post('/records/send', 'Api\RecordsController@send');