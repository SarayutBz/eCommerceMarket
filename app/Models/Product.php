<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'productID';
    protected $fillable = ['stockquantity','name', 'imageurl','price','description','categoryID'];
}
