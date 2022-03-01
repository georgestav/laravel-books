<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookshop;

class BookshopController extends Controller
{
    /**
     * Get all bookshops from db
     * default limit 30 results
     */
    public function index()
    {
        $bookshops = Bookshop::limit($limit ?? 30)
            ->orderByDesc('updated_at')
            ->get();
        return view('admin.bookshop.index', compact('bookshops'));
    }

    /**
     * Controller to bring up the form to create a new bookshop
     */
    public function create()
    {
        return view('admin.bookshop.bookshop_form');
    }

    /**
     * Controller to store the form result to the db
     * perfoms validation before storing
     */
    public function store(Request $request)
    {
        //validate data before processing
        $this->validate($request, [
            'bookshop_name' => 'required'
        ]);

        $bookshop = new Bookshop;
        $bookshop->name = ucfirst($request->bookshop_name) . ' ' .
            ucfirst((strtolower($request->bookshop_last_name)));
        $bookshop->city = $request->bookshop_city;
        $bookshop->save();

        session()->flash('success_message', 'Bookshop saved successfully');
        return redirect()->action('Admin\BookshopController@edit', ['id' => $bookshop->id]);
    }

    /**
     * Controller to show an bookshop by ID
     */
    public function show($id)
    {
        $bookshop = Bookshop::findOrFail($id);
        return view('admin.bookshop.view_bookshop', compact('bookshop'));
    }

    /**
     * Controller to bring up the form and edit an bookshop
     * by passing in their ID
     */
    public function edit($id)
    {
        $bookshop = Bookshop::findOrFail($id);

        return view('admin.bookshop.bookshop_form', compact('bookshop'));
    }

    /**
     * Controller to store the edited bookshop
     * performs validation before storing
     */
    public function update(Request $request)
    {
        //validate data before processing
        $this->validate($request, [
            'bookshop_name' => 'required',
        ]);

        $bookshop = Bookshop::findOrFail($request->id);
        $bookshop->name = ucfirst($request->bookshop_name) . ' ' . ucfirst((strtolower($request->bookshop_last_name)));
        $bookshop->city = $request->bookshop_city;
        $bookshop->save();
        session()->flash('success_message', 'Bookshop saved successfully');
        return view('admin.bookshop.view_bookshop', compact('bookshop'));
    }

    /**
     * Delete an Bookshop by their ID
     */
    public function destroy($id)
    {
        $res = Bookshop::destroy($id);
        if ($res === 1) {
            return redirect('/admin/bookshops');
        } else {
            return redirect('/admin/bookshops');
        }
    }

    /**
     * Search functionality on bookshops
     */
    public function search(Request $request)
    {
        //todo: search logic
        dump($request);
        return redirect()->action([BookshopController::class, 'show'], ['id' => 123]);
    }
}
