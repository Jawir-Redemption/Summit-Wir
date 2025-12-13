<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $orders = Order::with('user')
            ->when($request->filled('status'), function ($query) use ($request) {
                if ($request->status === 'overdue') {
                    $query
                        ->whereNotIn('status', ['completed', 'cancelled'])
                        ->whereRaw('DATE_ADD(loan_date, INTERVAL duration DAY) < ?', [now()]);
                } else {
                    $query->where('status', $request->status);
                }
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    /**
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        $order->load(['user', 'orderDetails']);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * @return \Illuminate\View\View
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
        // Validasi hanya untuk status
        $validated = $request->validate([
            'status' => 'required|string|in:pending,paid,on_rent,overdue,completed,cancelled,failed',
        ]);

        // Update status
        $order->status = $validated['status'];
        $order->save();

        if ($validated['status'] === 'on_rent') {
            $order->loan_date = now();
            $order->return_date = now()->addDays($order->duration);
            foreach ($order->orderDetails as $detail) {
                $product = $detail->product;
                $product->stock -= $detail->quantity;
                $product->sold += $detail->quantity;
                $product->save();
            }

            $order->save();
            return redirect()->route('admin.orders.show', $order->id);
        }

        if ($validated['status'] === 'paid') {
            foreach ($order->orderDetails as $detail) {
                $product = $detail->product;
                $product->stock -= $detail->quantity;
                $product->sold += $detail->quantity;
                $product->save();
            }

            $order->save();
            return redirect()->route('admin.orders.show', $order->id);
        }

        // Jika status jadi completed, update stock/sold produk
        if ($validated['status'] === 'completed') {
            $order->orderDetails->each(function (OrderDetail $detail) {
                /** @var \App\Models\Product $product */
                $product = $detail->product;

                $product->sold += $detail->quantity;
                $product->save();
            });
        }

        return redirect()->back()->with('success', 'Status order berhasil diperbarui.');
    }
}
