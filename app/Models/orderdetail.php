<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';

    protected $fillable = ['orderID','productID','quantity','price','unitprice','userID'];
}
