<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $monthlyLoans = Order::select(DB::raw('MONTH(loan_date) as month'), DB::raw('SUM(total_price) as total'))
            ->whereYear('loan_date', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(loan_date)'))
            ->pluck('total', 'month')
            ->toArray();

        // Siapkan label bulan dan data jumlah transaksi
        $labels = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $data[] = $monthlyLoans[$i] ?? 0; // isi 0 jika tidak ada data di bulan itu
        }

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
                'labels',
                'data',
            ),
        );
    }
}
