<?php

use App\Http\Controllers\Admin\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/authors/', [AuthorController::class, 'index']); // admin view authors

Route::get('/admin/authors/create', [AuthorController::class, 'create']); // admin create author
Route::post('/admin/authors/', [AuthorController::class, 'store']); // admin save new author

Route::get('/admin/authors/{id}', [AuthorController::class, 'show']); //show author by their id

Route::get('/admin/authors/{id}/edit', [AuthorController::class, 'edit']); //show author by their id
Route::put('/admin/authors/{id}', [AuthorController::class, 'update']); //show author by their id

Route::delete('/admin/authors/{id}', [AuthorController::class, 'destroy']); //show author by their id
