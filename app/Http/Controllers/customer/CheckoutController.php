<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Show checkout review page for a specific order
     */
    public function index(Order $order)
    {
        $user = Auth::user();

        // Prevent users from accessing others' orders
        if ($order->user_id !== $user->id) {
            return redirect()->route('cart')->with('error', 'Akses ditolak.');
        }

        // Ensure order has related products
        $order->load('orderDetails.product');

        if ($order->orderDetails->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Pesanan tidak memiliki produk.');
        }

        return view('customer.checkout', compact('order'));
    }

    /**
     * Process checkout: calculate duration, price, create order
     * Called after user clicks "Checkout" from cart
     */
    public function process(Request $request)
    {
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();
        $duration = (int) $request->input('duration', 1);

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Keranjang kosong.');
        }

        // Calculate total
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity) * $duration;

        // Dates
        $loanDate = now();
        $returnDate = now()->addDays($duration);

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'duration' => $duration,
            'status' => 'pending',
            'total_price' => $total,
            'total_fine' => 0,
        ]);

        // Attach cart items to order
        foreach ($cartItems as $item) {
            $order->orderDetails()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Clear cart
        $user->cartItems()->delete();

        // Redirect to checkout review
        return redirect()->route('checkout', ['order' => $order->id]);
    }

    public function cancel(Order $order)
    {
        $user = Auth::user();

        if ($order->user_id !== $user->id) {
            return redirect()->route('cart')->with('error', 'Akses ditolak.');
        }

        if (!in_array($order->status, ['pending', 'paid'])) {
            return redirect()
                ->route('checkout', ['order' => $order->id])
                ->with('error', 'Pesanan ini tidak dapat dibatalkan.');
        }

        $order->status = 'canceled';
        $order->save();

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
