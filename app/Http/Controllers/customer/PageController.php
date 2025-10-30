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

        // $query = Product::query();

        // if ($request->filled('category')) {
        //     $query->where('category_id', $request->category);
        // }

        // if ($request->filled('search')) {
        //     $query->where('name', 'like', '%' . $request->search . '%');
        // }

        // Query produk (urutkan berdasarkan produk terbaru)
        $products = Product::orderBy('created_at', 'desc')
            ->take(12)
            ->get();

        // Data keranjang (jika user login)
        $cartItems = [];

        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = CartItem::with('product')
                ->where('user_id', $user->id)
                ->get();
        }

        // Kirim data ke view
        return view('customer.home', compact('categories', 'products', 'cartItems'));
    }
}
