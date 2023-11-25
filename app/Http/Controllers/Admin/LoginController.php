<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle the login form submission
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        // Retrieve the user by email
        $user = User::where('email', $credentials['email'])
            ->where('password', $credentials['password'])
            ->first();

        if ($user) {
            // Authentication passed
            session(['user_id' => $user->id]); // Store the user id in the session

            if ($user->is_admin) {
                // Admin user
                return app(DashboardController::class)->index();
            } else {
                // Regular user
                return app(HomeController::class)->index();
            }
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput($request->only('email'));
    }
}
