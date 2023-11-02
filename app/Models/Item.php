<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
}
