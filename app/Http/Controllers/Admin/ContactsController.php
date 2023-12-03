<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('problem_solved', 0)->get();
        return view('admin.contact', compact('contacts'));
    }

    public function markSolved(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['problem_solved' => 1]);

        return redirect()->route('admin.contact')->with('success', 'Problem Solved!');
    }
}