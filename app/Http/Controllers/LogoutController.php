<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;

class LogoutController extends Controller
{
    public function logout()
    {
        // Clear any user-related session data
        Session::forget('user_id');

        return app(HomeController::class)->index();
    }
}
