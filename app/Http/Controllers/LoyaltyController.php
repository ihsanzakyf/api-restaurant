<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoyaltyPoints;

class LoyaltyController extends Controller
{
    public function show(Request $request)
    {
        $points = LoyaltyPoints::where('user_id', $request->user()->id)->first();

        return response()->json([
            'user_id' => $request->user()->id,
            'points' => isset($points) ? $points->points : 0
        ]);
    }
}
