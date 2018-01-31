<?php

Auth::routes();

// View Routes
Route::get('/', 'FrontPageController@index')->name('frontpage');
Route::get('/home', 'AdminController@home')->name('home');
Route::get('/property-search', 'PropertySearchController@index')->name('property.index');
Route::get('/listing/{id}', 'PropertySearchController@show')->name('property.show');
Route::get('/my-properties', 'AdminController@myProperties')->name('realtorproperties');

// API Routes
Route::get('/authenticate', 'AuthenticationController@show');
Route::patch('/users/{id}', 'UsersController@update');
Route::get('/archivedleads', 'ArchivedLeadsController@index');
Route::get('/mylistings', 'RealtorPropertiesController@index');

// Resourceful routes
Route::resource('/leads', 'LeadsController');
Route::resource('/notes', 'NotesController');

// Misc
Route::get('/leads/{lead}/notes', 'LeadNotesController@index');