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
        // Ambil semua kategori (jika tabel kosong, tidak masalah)
        $categories = Category::all();

        // Ambil produk terbaru (tanpa kolom 'sold')
        $products = Product::latest()->take(12)->get();

        // Jika database produk masih kosong, buat dummy data sementara
        if ($products->isEmpty()) {
            $products = collect([
                (object)[
                    'id' => 1,
                    'name' => 'Jaket Gunung Summit',
                    'price' => 150000,
                    'image' => 'dummy1.jpg',
                ],
                (object)[
                    'id' => 2,
                    'name' => 'Carrier 45L',
                    'price' => 200000,
                    'image' => 'dummy2.jpg',
                ],
                (object)[
                    'id' => 3,
                    'name' => 'Sepatu Hiking Pro',
                    'price' => 180000,
                    'image' => 'dummy3.jpg',
                ],
            ]);
        }

        // Inisialisasi keranjang kosong
        $cartItems = collect();

        // Jika user login, ambil item keranjang mereka
        if (Auth::check()) {
            $cartItems = CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get();
        }

        return view('customer.home', compact('categories', 'products', 'cartItems'));
    }

    // ====== Tambahan agar halaman lain bisa diakses tanpa error ======
    public function allProducts()   { return view('customer.all-products'); }
    public function cart()          { return view('customer.cart'); }
    public function checkout()      { return view('customer.checkout'); }
    public function guide()         { return view('customer.guide'); }
    public function account()       { return view('customer.account'); }
    public function productDetail() { return view('customer.product-detail'); }


    
    // KU NON AKTIFIN DULU KARNA MAU PAKE DATA DUMY NEK PAKE INI NGGA BISA JALAN CUG EROR TRS BUAT LIAT LANDINGPAGE CUSTOMER
    //public function home(Request $request)
    //{
       // $categories = Category::all();

        // $query = Product::query();

        // if ($request->filled('category')) {
        //     $query->where('category_id', $request->category);
        // }

        // if ($request->filled('search')) {
        //     $query->where('name', 'like', '%' . $request->search . '%');
        // }

        //$products = Product::orderBy('sold', 'desc')->take(12)->get();

        //$cartItems = [];

        //if (Auth::check()) {
       //     $user = Auth::user();
        //    $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();
        //}

       // return view('customer.home', compact('categories', 'products', 'cartItems'));
    //} 
}
