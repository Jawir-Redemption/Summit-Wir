<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $pendingCount = Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();
            
        $rentingCount = Order::where('user_id', $user->id)
            ->where('status', 'renting')
            ->count();
            
        $completedCount = Order::where('user_id', $user->id)
            ->where('status', 'completed')
            ->count();
            
        $cancelledCount = Order::where('user_id', $user->id)
            ->where('status', 'cancelled')
            ->count();
        
        return view('customer.profile.index', compact(
            'user',
            'pendingCount',
            'rentingCount',
            'completedCount',
            'cancelledCount'
        ));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('customer.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // ... kode update tetap sama ...
    }

    // ========== METHOD ORDERS (SUDAH DISESUAIKAN) ==========
    
    public function pendingOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->with(['orderDetails.product']) // ← UBAH dari orderItems jadi orderDetails
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('customer.orders.pending', compact('orders'));
    }

    public function rentingOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('status', 'renting')
            ->with(['orderDetails.product']) // ← UBAH dari orderItems jadi orderDetails
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('customer.orders.renting', compact('orders'));
    }

    public function completedOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('status', 'completed')
            ->with(['orderDetails.product']) // ← UBAH dari orderItems jadi orderDetails
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('customer.orders.completed', compact('orders'));
    }

    public function cancelledOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('status', 'cancelled')
            ->with(['orderDetails.product']) // ← UBAH dari orderItems jadi orderDetails
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('customer.orders.cancelled', compact('orders'));
    }
}