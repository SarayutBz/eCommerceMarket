<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['productID', 'userID', 'quantity', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
