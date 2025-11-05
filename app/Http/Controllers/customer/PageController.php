<?php

namespace App\Http\Controllers\customer;

use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(Request $request)
    {
        // Ambil semua kategori
        $categories = Category::all();

        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Query produk (urutkan berdasarkan produk terbaru)
        $products = $query->orderBy('created_at', 'desc')->take(12)->get();

        // Data keranjang (jika user login)
        $cartItems = [];

        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();
        }

        // Kirim data ke view
        return view('customer.home', compact('categories', 'products', 'cartItems'));
    }

    public function products(Request $request)
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

    public function howToOrder()
    {
        return view('customer.how_to_order');
    }

// ✅ [TAMBAHAN HANIF] — Method untuk halaman detail produk
    public function productDetail($id)
    {
        // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Ambil produk lain untuk rekomendasi (opsional)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();

        // Kirim ke view customer/product-detail.blade.php
        return view('customer.product-detail', compact('product', 'relatedProducts'));
    }
}
