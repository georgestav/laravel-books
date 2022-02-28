<?php

use App\Http\Controllers\Admin\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/authors/', 'AuthorController@index'); // admin view authors

Route::get('/admin/authors/create', 'AuthorController@create'); // admin create author
Route::post('/admin/authors/', 'AuthorController@store'); // admin save new author

Route::get('/admin/authors/{id}', 'AuthorController@show'); //show author by their id
Route::get('/admin/authors/{id}/edit', 'AuthorController@edit'); //show author by their id
Route::put('/admin/authors/{id}', 'AuthorController@update'); //show author by their id
Route::delete('/admin/authors/{id}', 'AuthorController@destroy'); //show author by their id
