<?php
// app/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'categoryID';

    // ประกาศความสัมพันธ์
    public function products()
    {
        return $this->hasMany(Product::class, 'categoryID');
    }

    protected $fillable = [
        'categoryID',
        'categoryname',
        
    ];
}
