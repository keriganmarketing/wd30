<?php

Auth::routes();

Route::get('/', 'FrontPageController@index')->name('frontpage');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/property-search', 'PropertiesController@index')->name('property.index');
Route::get('/listing/{id}', 'PropertiesController@show')->name('property.show');
Route::get('/my-properties', 'RealtorPropertiesController@index')->name('realtorpropertiesw');

Route::get('/authenticate', 'AuthenticationController@show');
Route::patch('/users/{id}', 'UsersController@update');
Route::get('/archivedleads', 'ArchivedLeadsController@index');

Route::resource('/leads', 'LeadsController');
Route::resource('/notes', 'NotesController');

Route::get('/leads/{lead}/notes', 'LeadNotesController@index');