<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ManagerOrderController extends Controller
{
    public function index(Request $request)
    {
        $managerId = $request->user()->id;

        $orders = Order::whereHas('items.restaurant', function ($query) use ($managerId) {
            $query->where('manager_id', $managerId);
        })->with(['items', 'user'])->get();

        return response()->json($orders);
    }
}
