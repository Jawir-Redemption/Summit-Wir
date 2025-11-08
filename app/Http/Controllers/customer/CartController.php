<?php

namespace App\Http\Controllers\customer;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        $user = Auth::user();

        // Check if product already exists in user's cart
        $cartItem = CartItem::where('user_id', $user->id)->where('product_id', $product->id)->first();

        if ($cartItem) {
            // If it exists, just increase the quantity
            $cartItem->increment('quantity');
        } else {
            // Otherwise, create a new cart entry
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }
}
