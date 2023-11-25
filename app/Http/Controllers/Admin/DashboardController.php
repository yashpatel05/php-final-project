<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Feedback;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $orderCount = Order::count();
        $userCount = User::count();
        $productCount = Product::count();
        $feedbackCount = Feedback::count();

        $user = $this->getAuthenticatedUser();

        $orders = Order::where('order_status', 0)->with('user')->get();

        return view('admin.index', compact('orderCount', 'userCount', 'productCount', 'feedbackCount', 'user', 'orders'));
    }

    private function getAuthenticatedUser()
    {
        $userId = session('user_id');
        return User::where('id', $userId)->first();
    }

    public function acceptOrder($id, $uid)
    {
        // Logic for accepting the order
        // ...

        return view('admin.dashboard')->with('success', 'Order accepted successfully.');
    }

    public function rejectOrder($id, $uid)
    {
        // Logic for rejecting the order
        // ...

        return view('admin.dashboard')->with('success', 'Order rejected successfully.');
    }
}
