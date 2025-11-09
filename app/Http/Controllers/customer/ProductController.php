<?php

namespace App\Http\Controllers\customer;

use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

        $cartItems = [];

        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();
        }

        return view('customer.products', compact('categories', 'products', 'cartItems'));
    }

    public function show($id)
    {
        // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Ambil produk lain untuk rekomendasi (opsional)
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->take(4)->get();

        // Kirim ke view customer/product-detail.blade.php
        return view('customer.product-detail', compact('product', 'relatedProducts'));
    }
}
