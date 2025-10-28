<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search') && $request->search != '') {
            $orders = Order::with('user')
                ->when($request->search, function ($query, $search) {
                    $query->where('id', 'like', "%{$search}%")->orWhereHas('user', function ($q) use ($search) {
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
            'status' => 'required|string|in:pending,ongoing,overdue,completed,cancelled',
            'note' => 'nullable|string|max:255',
            'additional_fine' => 'nullable|numeric|min:0',
        ]);

        $order = Order::findOrFail($order);
        $order->status = $request->status;
        $order->save();

        if ($validated['status'] === 'completed') {
            $order->orderDetails->each(function ($detail) {
                $product = $detail->product;
                $product->sold += $detail->quantity;
                $product->save();
            });
        }

        $order->update($validated);
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        // Validasi hanya untuk status
        $validated = $request->validate([
            'status' => 'required|string|in:pending,ongoing,overdue,completed,cancelled',
        ]);

        // Update status
        $order->status = $validated['status'];
        $order->save();

        // Jika status jadi completed, update stock/sold produk
        if ($validated['status'] === 'completed') {
            $order->orderDetails->each(function ($detail) {
                $product = $detail->product;
                $product->sold += $detail->quantity;
                $product->save();
            });
        }

        return redirect()->back()->with('success', 'Status order berhasil diperbarui.');
    }
}
