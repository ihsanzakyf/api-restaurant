<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalRevenue = Payment::sum('amount');
        $totalUsers = User::count();

        return response()->json([
            'total_orders' => $totalOrders,
            'total_revenue' => $totalRevenue,
            'total_users' => $totalUsers,
        ]);
    }
}
