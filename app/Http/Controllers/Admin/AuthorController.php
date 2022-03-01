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
        $authors = Author::limit($limit ?? 15)
            ->orderByDesc('updated_at')
            ->get();
        return view('admin.author.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.author.create_form');
    }

    public function store(Request $request)
    {
        $author = Author::saveAuthor($request);
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

    public function update(Request $request)
    {
        $author = Author::saveAuthor($request);
        return view('admin.author.view_author', compact('author'));
    }


    public function destroy($id)
    {
        $res = Author::destroy($id);
        if ($res === 1) {
            return redirect('/admin/authors');
        } else {
            return redirect('/admin/authors');
        }
    }
}
