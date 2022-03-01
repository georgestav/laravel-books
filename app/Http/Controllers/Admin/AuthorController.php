<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Get all authors from db
     * default limit 30 results
     */
    public function index()
    {
        $authors = Author::limit($limit ?? 30)
            ->orderByDesc('updated_at')
            ->get();
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Controller to bring up the form to create a new author
     */
    public function create()
    {
        return view('admin.author.author_form');
    }

    /**
     * Controller to store the form result to the db
     * perfoms validation before storing
     */
    public function store(Request $request)
    {
        //validate data before processing
        $this->validate($request, [
            'author_name' => 'required',
            'author_bio' => 'nullable|min:12'
        ]);

        $author = new Author;
        $author->name = ucfirst($request->author_name) . ' ' . ucfirst((strtolower($request->author_last_name)));
        $author->bio = $request->author_bio;
        $author->slug = strtolower($request->author_name) . '-' . strtolower($request->author_last_name) . '-author';

        $author->save();

        session()->flash('success_message', 'Author saved successfully');
        return redirect()->action('Admin\AuthorController@edit', ['id' => $author->id]);
    }

    /**
     * Controller to show an author by ID
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.author.view_author', compact('author'));
    }

    /**
     * Controller to bring up the form and edit an author
     * by passing in their ID
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view('admin.author.author_form', compact('author'));
    }

    /**
     * Controller to store the edited author
     * performs validation before storing
     */
    public function update(Request $request)
    {
        //validate data before processing
        $this->validate($request, [
            'author_name' => 'required',
            'author_bio' => 'nullable|min:12'
        ]);

        $author = Author::findOrFail($request->id);
        $author->name = ucfirst($request->author_name) . ' ' . ucfirst((strtolower($request->author_last_name)));
        $author->bio = $request->author_bio;
        $author->slug = strtolower($request->author_name) . '-' . strtolower($request->author_last_name) . '-author';

        $author->save();
        session()->flash('success_message', 'Author saved successfully');
        return view('admin.author.view_author', compact('author'));
    }

    /**
     * Delete an Author by their ID
     */
    public function destroy($id)
    {
        $res = Author::destroy($id);
        if ($res === 1) {
            return redirect('/admin/authors');
        } else {
            return redirect('/admin/authors');
        }
    }

    /**
     * Search functionality on authors
     */
    public function search(Request $request)
    {
        //todo: search logic
        dump($request);
        return redirect()->action([AuthorController::class, 'show'], ['id' => 123]);
    }
}
