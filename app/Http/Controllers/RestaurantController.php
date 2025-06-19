<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with(['menuItems', 'manager'])->get();
        return response()->json($restaurants);
    }
    
}
