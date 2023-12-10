<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;

class MyOrdersController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        $user = User::find($userId);

        $order_details = OrderDetail::join('products as P', 'order_details.product_id', '=', 'P.id')
            ->join('orders as O', 'order_details.order_id', '=', 'O.id')
            ->where('O.user_id', $userId)
            ->select(
                'order_details.*', // select all columns from order_details
                'P.name as product_name', // select the product name
                'O.order_date', // select the order date
            )
            ->get();

        // Get data from the database
        $categories = Category::with('subcategories')->get();

        return view('user.myorder', compact('user', 'order_details', 'categories'));
    }
}