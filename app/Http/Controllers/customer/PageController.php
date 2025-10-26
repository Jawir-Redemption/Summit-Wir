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
        $categories = Category::all();

        $products = Product::orderBy('sold', 'desc')->take(12)->get();

        $cartItems = [];

        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();
        }

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
}
