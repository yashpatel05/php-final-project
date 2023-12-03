<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class FeedbacksController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user', 'product')->get();

        return view('admin.feedback', compact('feedbacks'));
    }
}