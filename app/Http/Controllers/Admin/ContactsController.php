<?php

namespace App\Http\Controllers\Admin;

use App\Mail\ContactResponseMail;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('problem_solved', 0)->get();
        return view('admin.contact', compact('contacts'));
    }

    public function markSolved(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'admin_message' => 'required',
        ]);

        // Find the contact record
        $contact = Contact::findOrFail($id);

        // Update the problem_solved column
        $contact->update(['problem_solved' => 1]);

        // Send email to the customer
        $customerEmail = $contact->email;
        $problemDetails = $contact->message;
        $adminMessage = $request->input('admin_message');

        Mail::to($customerEmail)->send(new ContactResponseMail($problemDetails, $adminMessage));

        return redirect()->route('admin.contact')->with('success', 'Problem marked as solved and email sent to the customer.');
    }
}
