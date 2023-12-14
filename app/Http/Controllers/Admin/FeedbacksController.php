<?php

namespace App\Http\Controllers\Admin;

use App\Mail\FeedbackReplyMail;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbacksController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user', 'product')->get();

        return view('admin.feedback', compact('feedbacks'));
    }

    public function feedbackReply(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'admin_message_text' => 'required',
        ]);

        // Find the feedback record
        $feedback = Feedback::findOrFail($id);

        // Send email to the customer
        $customerEmail = $feedback->user->email;
        $adminMessage = $request->input('admin_message_text');

        Mail::to($customerEmail)->send(new FeedbackReplyMail($adminMessage));

        // Redirect or perform additional actions as needed
        return redirect()->back()->with('success', 'Message sent to the customer.');
    }
}
