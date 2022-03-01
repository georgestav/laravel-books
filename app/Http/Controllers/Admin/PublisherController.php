<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    /**
     * Get all publishers from db
     * default limit 30 results
     */
    public function index()
    {
        $publishers = Publisher::limit($limit ?? 30)
            ->orderByDesc('updated_at')
            ->get();
        return view('admin.publisher.index', compact('publishers'));
    }

    /**
     * Controller to bring up the form to create a new publisher
     */
    public function create()
    {
        return view('admin.publisher.publisher_form');
    }

    /**
     * Controller to store the form result to the db
     * perfoms validation before storing
     */
    public function store(Request $request)
    {
        //validate data before processing
        $this->validate($request, [
            'publisher_name' => 'required'
        ]);

        $publisher = new Publisher;
        $publisher->name = ucfirst($request->publisher_name) . ' ' .
            ucfirst((strtolower($request->publisher_last_name)));

        $publisher->slug = strtolower($request->publisher_name) . '-' .
            strtolower($request->publisher_last_name) . '-publisher';

        $publisher->save();

        session()->flash('success_message', 'Publisher saved successfully');
        return redirect()->action('Admin\PublisherController@edit', ['id' => $publisher->id]);
    }

    /**
     * Controller to show an publisher by ID
     */
    public function show($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('admin.publisher.view_publisher', compact('publisher'));
    }

    /**
     * Controller to bring up the form and edit an publisher
     * by passing in their ID
     */
    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);

        return view('admin.publisher.publisher_form', compact('publisher'));
    }

    /**
     * Controller to store the edited publisher
     * performs validation before storing
     */
    public function update(Request $request)
    {
        //validate data before processing
        $this->validate($request, [
            'publisher_name' => 'required',
        ]);

        $publisher = Publisher::findOrFail($request->id);
        $publisher->name = ucfirst($request->publisher_name) . ' ' . ucfirst((strtolower($request->publisher_last_name)));
        $publisher->slug = strtolower($request->publisher_name) . '-' . strtolower($request->publisher_last_name) . '-publisher';

        $publisher->save();
        session()->flash('success_message', 'Publisher saved successfully');
        return view('admin.publisher.view_publisher', compact('publisher'));
    }

    /**
     * Delete an Publisher by their ID
     */
    public function destroy($id)
    {
        $res = Publisher::destroy($id);
        if ($res === 1) {
            return redirect('/admin/publishers');
        } else {
            return redirect('/admin/publishers');
        }
    }

    /**
     * Search functionality on publishers
     */
    public function search(Request $request)
    {
        //todo: search logic
        dump($request);
        return redirect()->action([PublisherController::class, 'show'], ['id' => 123]);
    }
}
