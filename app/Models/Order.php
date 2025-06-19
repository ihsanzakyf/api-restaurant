<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Payment;
use App\Models\MenuItem;


class Order extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsToMany(MenuItem::class, 'order_items')
                    ->withPivot('quantity', 'price');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
