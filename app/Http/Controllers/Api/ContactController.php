<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=Contact::all();

        return inertia('Contacts/Index', compact('contacts'));
    }

    public function create()
    {
        return inertia('Contacts/Create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact = Contact::create($request->all());

        return to_route('dashboard');
    }
//    /**
//     * Display the specified resource.
//     */
    public function show(string $id)
    {
        return Contact::findOrFail($id);
    }

    public function edit(Contact $contact){
        return inertia('Contacts/Edit', compact('contact'));
    }
//
//    /**
//     * Update the specified resource in storage.
//     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->route('dashboard');
    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('dashboard')->with('message','Post deleted successfully');
    }
}
