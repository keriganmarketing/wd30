<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/authenticate', 'AuthenticationController@show');
Route::patch('/users/{id}', 'UsersController@update');
Route::resource('/leads', 'LeadsController');
