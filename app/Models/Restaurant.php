<?php

namespace App\Models;

use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'address',
        'manager_id',
        'status',
    ];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}
