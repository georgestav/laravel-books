<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\PublisherController;
use Illuminate\Support\Facades\Route;

//Authors Routes
Route::get('/admin/authors/', [AuthorController::class, 'index']); // admin view authors

Route::get('/admin/authors/create', [AuthorController::class, 'create']); // admin create author
Route::post('/admin/authors/', [AuthorController::class, 'store']); // admin save new author

Route::get('/admin/authors/{id}', [AuthorController::class, 'show']); //show author by their id

Route::get('/admin/authors/{id}/edit', [AuthorController::class, 'edit']); //show author by their id
Route::put('/admin/authors/{id}', [AuthorController::class, 'update']); //show author by their id

Route::delete('/admin/authors/{id}', [AuthorController::class, 'destroy']); //show author by their id


Route::post('/admin/authors/search', [AuthorController::class, 'search']);


//Publisher Routes
Route::get('/admin/publishers/', [PublisherController::class, 'index']); // admin view publishers

Route::get('/admin/publishers/create', [PublisherController::class, 'create']); // admin create publisher
Route::post('/admin/publishers/', [PublisherController::class, 'store']); // admin save new publisher

Route::get('/admin/publishers/{id}', [PublisherController::class, 'show']); //show publisher by their id

Route::get('/admin/publishers/{id}/edit', [PublisherController::class, 'edit']); //show publisher by their id
Route::put('/admin/publishers/{id}', [PublisherController::class, 'update']); //show publisher by their id

Route::delete('/admin/publishers/{id}', [PublisherController::class, 'destroy']); //show publisher by their id


Route::post('/admin/publishers/search', [PublisherController::class, 'search']);
