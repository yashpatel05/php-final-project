<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

class MyAccountController extends Controller
{
    public function index()
    {
        $id = session('user_id');
        $user = User::find($id);

        // Get data from the database
        $categories = Category::with('subcategories')->get();

        return view('user.myaccount', compact('user', 'categories'));
    }

    public function update(Request $request)
    {
        // Validate the form data
        $request->validate([
            'userName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contactNo' => 'required|string|max:15',
            'streetAddress' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postalCode' => 'required|string|max:10',
            'country' => 'required|string|max:255',
        ]);

        // Get the user ID from the session
        $userId = session('user_id');

        // Find the user by ID
        $user = User::find($userId);

        // Update user data
        $user->name = $request->input('userName');
        $user->email = $request->input('email');
        $user->contact_no = $request->input('contactNo');
        $user->street_address = $request->input('streetAddress');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->postal_code = $request->input('postalCode');
        $user->country = $request->input('country');

        // Save the updated user data
        $user->save();

        $user = User::find($userId);

        // Get data from the database
        $categories = Category::with('subcategories')->get();

        // Redirect back to the account page with a success message
        return redirect()->route('myaccount')->with('success', 'Profile updated successfully')->with(compact('user', 'categories'));
    }

    public function changePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'CurrentPassword' => 'required|string|min:8',
            'NewPassword' => 'required|string|min:8',
            'ConfirmNewPassword' => 'required|string|same:NewPassword',
        ]);

        // Get the user ID from the session
        $userId = session('user_id');

        // Find the user by ID
        $user = User::find($userId);

        // Check if the entered current password matches the actual database password
        if ($request->input('CurrentPassword') !== $user->password) {
            return redirect()->route('change.password.form')->with('error', 'Incorrect current password');
        }

        // Update the user's password
        $user->password = $request->input('NewPassword');
        $user->save();

        $user = User::find($userId);

        // Get data from the database
        $categories = Category::with('subcategories')->get();

        // Redirect back to the password change form with a success message
        return redirect()->route('myaccount')->with('success', 'Password changed successfully!!!')->with(compact('user', 'categories'));;
    }
}