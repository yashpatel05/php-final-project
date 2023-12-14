<?php

namespace App\Http\Controllers;

use Laravel\Cashier\Cashier;
use Illuminate\Http\Request;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();

        // Check if the user is logged in
        if (!session()->has('user_id')) {
            // User is not logged in, redirect to login page
            return redirect()->route('login')->with('error', 'Please log in to view your cart');
        }

        // Get the user id
        $user_id = session('user_id');

        // Fetch all items added by the current user
        $cartItems = Cart::where('user_id', $user_id)->get();

        // Check if the cart is empty
        if ($cartItems->isEmpty()) {
            return redirect()->route('home')->with('error', 'Add items to the cart before placing an order.');
        }

        return view('user.checkout', compact('cartItems', 'categories'));
    }

    public function simulatePayment($amount)
    {
        // Get the user id
        $user_id = session('user_id');

        if ($user_id) {
            // Charge the user
            $user = User::find($user_id);
            try {
                $user->charge($amount, [
                    'currency' => 'CAD',
                ]);
            } catch (\Exception $e) {
                // Redirect back to the cart or handle the error as needed
                return redirect()->route('cart')->with('error', 'Payment failed. Please try again.');
            }
        }
    }

    public function placeOrder(Request $request)
    {
        // Validate form fields
        $request->validate([
            'cardNumber' => 'required|numeric|digits:16',
            'expiryDate' => 'required|date_format:m/y|after_or_equal:today',
            'cvv' => 'required|numeric|digits:3',
        ]);

        // Check if the user is logged in
        if (!session()->has('user_id')) {
            // User is not logged in, redirect to login page
            return redirect()->route('login')->with('error', 'Please log in to place the order');
        }

        // Begin a database transaction to ensure atomicity
        \DB::beginTransaction();

        try {
            // Get the user id
            $user_id = session('user_id');

            // Fetch all items added by the current user from the cart
            $cartItems = Cart::where('user_id', $user_id)->get();

            // Create a new order
            $order = Order::create([
                'user_id' => $user_id,
                'payment_status' => 1, // Assuming 1 means payment received
                'order_status' => 1
            ]);

            // Initialize an array to store product information
            $productsInfo = [];
            $totalAmount = 0;

            // Iterate over each cart item and insert into order_details
            foreach ($cartItems as $cartItem) {
                $quantityToDeduct = $cartItem->quantity;

                // Deduct the purchased quantity from the products table
                Product::where('id', $cartItem->product_id)
                    ->decrement('quantity', $quantityToDeduct);

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $quantityToDeduct,
                    'total_amount' => $cartItem->price * $quantityToDeduct,
                ]);

                // Store product information for the email
                $productsInfo[] = [
                    'name' => $cartItem->product->name,
                    'quantity' => $quantityToDeduct,
                    'price' => $cartItem->price,
                    'total' => $cartItem->price * $quantityToDeduct,
                ];

                // Increment the total amount
                $totalAmount += $cartItem->price * $quantityToDeduct;
            }

            // Process the payment using the FakePaymentGateway
            $this->simulatePayment($request->input('sub_total'));

            $user = User::find($user_id);

            // Send email to the user with order details
            Mail::to($user->email)->send(new OrderPlaced($order, $productsInfo, $totalAmount));

            // Empty the user's cart
            Cart::where('user_id', $user_id)->delete();

            // Commit the transaction
            \DB::commit();

            return redirect()->route('home')->with('success', 'Order placed successfully! Check your email for details.');
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            \DB::rollBack();

            // Log the exception or handle it as needed
            return redirect()->route('cart')->with('error', 'An error occurred while placing the order.');
        }
    }
}
