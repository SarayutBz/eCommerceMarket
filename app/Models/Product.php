<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'productID';

    // ประกาศความสัมพันธ์
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
        
    }

    protected $fillable = [
        'productID',
        'name',
        'description',
        'price',
        'stockquantity',
        'imageurl',
        'categoryID',
    ];
    
}

