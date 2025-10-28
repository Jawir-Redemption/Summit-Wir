<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $revenue = Order::whereIn('status', ['completed'])->sum('total_price');
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $failedOrders = Order::where('status', 'cancelled')->count();
        $latestOrders = Order::with(['orderDetails', 'user'])
            ->latest()
            ->take(10)
            ->get();
        // $successOrders = Order::where('status', 'completed')->count();

        return view(
            'admin.index',
            compact(
                'totalUsers',
                'revenue',
                'totalOrders',
                'totalProducts',
                'pendingOrders',
                'failedOrders',
                'latestOrders',
                // 'successOrders',
            ),
        );
    }
}
