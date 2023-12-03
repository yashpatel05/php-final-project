<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Order;

class MyOrdersController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        $user = User::find($userId);

        $order_details = OrderDetails::join('products as P', 'order_details.product_id', '=', 'P.id')
            ->join('orders as O', 'order_details.order_id', '=', 'O.id')
            ->where('O.user_id', $userId)
            ->get();

        // Get data from the database
        $categories = Category::with('subcategories')->get();

        return view('user.myorder', compact('user', 'order_details', 'categories'));
    }
}