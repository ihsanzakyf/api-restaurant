<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required',
            'method' => 'required',
        ]);

        $payment = Payment::create([
            'order_id' => $validated['order_id'],
            'amount' => $validated['amount'],
            'method' => $validated['method'],
            'paid_at' => now(),
        ]);

        return response()->json([
            'message' => 'Payment recorded successfully',
            'data' => $payment
        ], 201);
    }
}
