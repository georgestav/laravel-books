<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;

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

    public function storeBookReview(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|max:255'
        ]);
        try {
            $review = new Review;
            $review->book_id = $request->id;
            $review->user_id = $request->user()->id;
            $review->text = $request->text;
            $review->save();
            session()->flash('success_message', 'Review saved successfully');
            return redirect()->action('Admin\BookController@show', ['id' => $request->id]);
        } catch (\Throwable $th) {
            session()->flash('error_message', 'You have reviewed this book already');
            return redirect()->action('Admin\BookController@show', ['id' => $request->id]);
        }
    }
}
