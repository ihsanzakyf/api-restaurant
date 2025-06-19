<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RestaurantController,
    MenuItemController,
    OrderController,
    PaymentController,
    LoyaltyController,
    ManagerOrderController,
    AdminRestaurantController,
    AdminUserController,
    AnalyticsController,
    AuthController
};

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('role:customer')->group(function () {
        // Browse restaurants and their menus
        Route::get('/restaurants', [RestaurantController::class, 'index']);
        Route::get('/restaurants/{id}/menu', [MenuItemController::class, 'byRestaurant']);

        // Place order and make payment
        Route::resource('/orders', OrderController::class)->only(['index', 'store', 'show']);
        Route::resource('/payments', PaymentController::class)->only(['store']);

        // View loyalty points
        Route::get('/loyalty-points', [LoyaltyController::class, 'show']);
    });

    Route::middleware('role:manager')->prefix('manager')->group(function () {
        // View incoming orders to their restaurants
        Route::get('/orders', [ManagerOrderController::class, 'index']);

        // Manage menu items (Create, Update, Delete)
        Route::resource('/menu-items', MenuItemController::class)->except(['show']);
    });
    
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        // Approve/reject restaurants
        Route::put('/restaurants/{id}/approve', [AdminRestaurantController::class, 'approve']);
        Route::put('/restaurants/{id}/reject', [AdminRestaurantController::class, 'reject']);

        // Manage users
        Route::delete('/users/{id}', [AdminUserController::class, 'destroy']);

        // View platform analytics
        Route::get('/analytics', [AnalyticsController::class, 'index']);
    });
});
