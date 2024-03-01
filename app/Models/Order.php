<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'orderID';

    // ประกาศความสัมพันธ์
    public function category()
    {
        return $this->belongsTo(order::class, 'orderID');
        
    }

    protected $fillable = [
       
        
        'totalAmount',
       
        
        
    ];
    
}
