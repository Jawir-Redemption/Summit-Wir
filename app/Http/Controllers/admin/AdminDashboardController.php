<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalUsers = Order::count();
        $totalProducts = Product::count();
        $successOrders = Order::where('status', 'success')->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $failedOrders = Order::where('status', 'failed')->count();
        $revenue = Order::whereIn('status', ['success', 'paid'])
                ->sum('total_price');
        $latestOrders = Order::with(['orderDetails', 'user'])->latest()->take(10)->get();
        
        return view('admin.index', compact('totalOrders', 'totalProducts', 'successOrders', 'pendingOrders', 'failedOrders', 'latestOrders', 'totalUsers', 'revenue'));
    }
}
