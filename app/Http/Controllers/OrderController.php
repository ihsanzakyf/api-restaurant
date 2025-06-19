<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::all());
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = Carbon::now();

        $order = Order::create($data);

        return response()->json([
            'message' => 'Order placed successfully',
            'data' => $order
        ], 201);
    }

    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return response()->json($order);
    }
}
