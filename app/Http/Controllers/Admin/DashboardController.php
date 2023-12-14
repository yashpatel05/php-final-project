<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Feedback;
use App\Models\OrderDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $orderCount = Order::count();
        $userCount = User::count();
        $productCount = Product::count();
        $feedbackCount = Feedback::count();

        // Get the current date
        $currentDate = Carbon::now()->toDateString();

        // Retrieve orders with order_date equal to the current date along with product names, quantities, total_amount, and product prices
        $orders = Order::whereRaw('DATE(order_date) = ?', [$currentDate])
            ->with([
                'orderDetails' => function ($query) {
                    $query->select('id', 'order_id', 'product_id', 'quantity', 'total_amount')
                        ->with(['product:id,name,price']);
                }
            ])
            ->get();

        return view('admin.index', compact('orderCount', 'userCount', 'productCount', 'feedbackCount', 'orders'));
    }

    private function getAuthenticatedUser()
    {
        $userId = session('user_id');
        return User::where('id', $userId)->first();
    }
}
