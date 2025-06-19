<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function byRestaurant($id)
    {
        $items = MenuItem::where('restaurant_id', $id)->get();
        return response()->json($items);
    }

    public function index()
    {
        return response()->json(MenuItem::all());
    }

    public function store(Request $request)
    {
        $item = MenuItem::create($request->all());
        return response()->json([
            'message' => 'Menu item created successfully',
            'data' => $item
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);
        $item->update($request->all());
        return response()->json([
            'message' => "Menu item with id {$id} updated",
            'data' => $item
        ]);
    }

    public function destroy($id)
    {
        $item = MenuItem::findOrFail($id);
        $item->delete();
        return response()->json([
            'message' => "Menu item with id {$id} deleted"
        ]);
    }
}
