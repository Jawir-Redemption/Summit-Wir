<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $successOrders = Order::where('status', 'success')->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $failedOrders = Order::where('status', 'failed')->count();
        $latestOrders = Order::latest()->take(10)->get();
        return view('admin.index', compact('totalOrders', 'successOrders', 'pendingOrders', 'failedOrders', 'latestOrders'));
    }
}
