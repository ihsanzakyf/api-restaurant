<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminRestaurantController extends Controller
{
    public function approve($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->status = 'approved';
        $restaurant->save();

        return response()->json(['message' => 'Restaurant approved.']);
    }

    public function reject($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->status = 'rejected';
        $restaurant->save();

        return response()->json(['message' => 'Restaurant rejected.']);
    }
}
