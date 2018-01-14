<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/authenticate', 'AuthenticationController@show');
Route::patch('/users/{id}', 'UsersController@update');
Route::get('/archivedleads', 'ArchivedLeadsController@index');

Route::resource('/leads', 'LeadsController');
Route::resource('/notes', 'NotesController');