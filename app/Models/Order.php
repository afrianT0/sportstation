<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
