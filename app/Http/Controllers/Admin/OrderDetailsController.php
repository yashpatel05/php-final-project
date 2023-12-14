<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;

class OrderDetailsController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'orderDetails' => function ($query) {
                $query->select('id', 'order_id', 'product_id', 'quantity', 'total_amount')
                    ->with(['product:id,name,price']);
            }
        ])->get();

        return view('admin.order-detail', compact('orders'));
    }
}
