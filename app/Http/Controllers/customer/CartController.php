<?php
namespace App\Http\Controllers\customer;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();
        return view('customer.cart', compact('cartItems'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $user = Auth::user();

        $cartItem = CartItem::where('user_id', $user->id)->where('product_id', $product->id)->first();

        $quantity = $request->input('quantity', 1);
        $duration = $request->input('duration', 1);

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $quantity,
                'duration' => $duration,
            ]);
        } else {
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'duration' => $duration,
            ]);
        }

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = CartItem::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $cart->update(['quantity' => $request->quantity]);

        // Optional: return JSON if you later want AJAX (no refresh)
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        // Default: redirect back for form autosubmit
        return redirect()->back();
    }

    public function deleteFromCart(CartItem $cart)
    {
        $user = Auth::user();
        if ($cart->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus item ini.');
        }
        $cart->delete();

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }
}
