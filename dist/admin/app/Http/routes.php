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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('candidates/export', 'CandidatesController@export');
Route::post('candidates/api', 'CandidatesController@api');
Route::get('candidates/{id}/download', 'CandidatesController@download');
Route::resource('candidates', 'CandidatesController');

Route::get('emails/export', 'EmailsController@export');
Route::post('emails/api', 'EmailsController@api');
Route::resource('emails', 'EmailsController');