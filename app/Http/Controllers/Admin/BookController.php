<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::limit($limit ?? 30)
            ->orderByDesc('updated_at')
            ->get();

        return view('admin.book.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.book.view_book', compact('book'));
    }
}
