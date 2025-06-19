<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LoyaltyPoints extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'points',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
