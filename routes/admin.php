<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\BookshopController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/', function () {
    return 'test';
})->middleware('auth');


//Authors Routes
Route::get('/admin/authors/', [AuthorController::class, 'index']); // admin view authors
Route::get('/admin/authors/create', [AuthorController::class, 'create'])->middleware('auth'); // admin create author
Route::post('/admin/authors/', [AuthorController::class, 'store'])->middleware('auth'); // admin save new author
Route::get('/admin/authors/{id}', [AuthorController::class, 'show']); //show author by their id
Route::get('/admin/authors/{id}/edit', [AuthorController::class, 'edit'])->middleware('auth'); //show author by their id
Route::put('/admin/authors/{id}', [AuthorController::class, 'update'])->middleware('auth'); //show author by their id
Route::delete('/admin/authors/{id}', [AuthorController::class, 'destroy'])->middleware('auth'); //show author by their id
Route::post('/admin/authors/search', [AuthorController::class, 'search']);


//Publisher Routes
Route::get('/admin/publishers/', [PublisherController::class, 'index']); // admin view publishers
Route::get('/admin/publishers/create', [PublisherController::class, 'create'])->middleware('auth'); // admin create publisher
Route::post('/admin/publishers/', [PublisherController::class, 'store'])->middleware('auth'); // admin save new publisher
Route::get('/admin/publishers/{id}', [PublisherController::class, 'show']); //show publisher by their id
Route::get('/admin/publishers/{id}/edit', [PublisherController::class, 'edit'])->middleware('auth'); //show publisher by their id
Route::put('/admin/publishers/{id}', [PublisherController::class, 'update'])->middleware('auth'); //show publisher by their id
Route::delete('/admin/publishers/{id}', [PublisherController::class, 'destroy'])->middleware('auth'); //show publisher by their id
Route::post('/admin/publishers/search', [PublisherController::class, 'search']);


//Bookshop Routes
Route::get('/admin/bookshops/', [BookshopController::class, 'index']); // admin view bookshops
Route::get('/admin/bookshops/create', [BookshopController::class, 'create'])->middleware('auth'); // admin create bookshop
Route::post('/admin/bookshops/', [BookshopController::class, 'store'])->middleware('auth'); // admin save new bookshop
Route::get('/admin/bookshops/{id}', [BookshopController::class, 'show']); //show bookshop by their id
Route::get('/admin/bookshops/{id}/edit', [BookshopController::class, 'edit'])->middleware('auth'); //show bookshop by their id
Route::put('/admin/bookshops/{id}', [BookshopController::class, 'update'])->middleware('auth'); //show bookshop by their id
Route::delete('/admin/bookshops/{id}', [BookshopController::class, 'destroy'])->middleware('auth'); //show bookshop by their id
Route::post('/admin/bookshops/search', [BookshopController::class, 'search']);
