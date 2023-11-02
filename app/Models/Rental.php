<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
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
