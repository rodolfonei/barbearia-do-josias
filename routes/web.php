<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// CRUD Routes da tabela Clientes
Route::get('/client/create', 'ClientController@create')->name('client.create');
Route::post('/client/create', 'ClientController@store');

//CRUD Routes da tabela Agendamentos
Route::get('/schedule/create', 'ScheduleController@create')->name('schedule.create');
Route::post('/schedule/create', 'ScheduleController@store');
Route::put('/schedule/{schedule}/cancel', 'ScheduleController@cancel')->name('schedule.cancel');
Route::put('/schedule/{schedule}/confirm', 'ScheduleController@confirm')->name('schedule.confirm');
