<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function latest()
    {
        $latest_books = Book::limit(10)
            ->orderByDesc('publication_date')
            ->get();
        return $latest_books;
    }
}
