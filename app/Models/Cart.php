<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Cart extends Model
{
    use HasFactory,HasApiTokens;
    protected $table = 'cart'; // ระบุชื่อตาราง
    protected $primaryKey = 'cartID';
    protected $fillable = [
        'productID',
        'userID',
        'quantity',
        'price',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }



}
