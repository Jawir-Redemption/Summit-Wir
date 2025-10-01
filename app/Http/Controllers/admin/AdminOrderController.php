<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $orders = Order::with('user')
                ->when($request->search, function ($query, $search) {
                    $query->where('id', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%");
                        });
                })
                ->latest()
                ->paginate(10)
                ->withQueryString();
        } else {
            $orders = Order::with('user')->latest()->paginate(10)->withQueryString();
        }


        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'orderDetails']);
        
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:50',
        ]);

        $order->update($validated);
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }
}
