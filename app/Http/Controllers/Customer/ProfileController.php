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
        $user = Auth::user();

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'ktp_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'current_password' => 'nullable|string|min:8',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update password jika diisi
        if (!empty($validated['current_password']) && !empty($validated['password'])) {
            if (password_verify($validated['current_password'], $user->password)) {
                $user->password = bcrypt($validated['password']);
            } else {
                return back()
                    ->withErrors(['current_password' => 'Password lama tidak sesuai.'])
                    ->withInput();
            }
        }

        // Upload foto KTP (1 file per user)
        if ($request->hasFile('ktp_image')) {
            // Tentukan nama file sesuai ID user
            $extension = $request->file('ktp_image')->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension; // contoh: 5.jpg

            // Hapus foto lama jika ada
            if ($user->ktp_image && Storage::disk('public')->exists($user->ktp_image)) {
                Storage::disk('public')->delete($user->ktp_image);
            }

            // Simpan dengan nama file sesuai ID user
            $path = $request->file('ktp_image')->storeAs('ktp', $filename, 'public');
            $user->ktp_image = $path;
        }

        // Update data lain
        $user->name = $validated['name'];
        $user->no_hp = $validated['no_hp'] ?? $user->no_hp;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
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