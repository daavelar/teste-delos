<?php

Route::get('/', 'DespesasController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
