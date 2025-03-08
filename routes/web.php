<?php

use Illuminate\Support\Facades\Route;

//front-end
Route::get('/', 'HomeController@index');

Route::get('/trangchu','HomeController@index' );

//back-end
Route::get('/admin','AdminController@index' );
