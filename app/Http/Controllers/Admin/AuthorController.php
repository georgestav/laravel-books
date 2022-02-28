<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Author as AdminAuthor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Get all authors from db
     */
    public function index()
    {
        $authors = Author::getAllAuthors(null);
        return view('admin.author.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.author.create_form');
    }

    public function store(Request $request)
    {
        $author = Author::saveNewAuthor($request);
        return view('admin.author.view_author', compact('author'));
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.author.view_author', compact('author'));
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view('admin.author.create_form', compact('author'));
    }
    public function destroy($id)
    {
        $res = Author::destroy($id);
        if ($res === 1) {
            return redirect('http://www.cbp-books.com/admin/authors')->with('success', 'Author Deleted successfully!');
        } else {
            return redirect('http://www.cbp-books.com/admin/authors')->with('failed', 'Operation unsuccesful!');
        }
    }
}
