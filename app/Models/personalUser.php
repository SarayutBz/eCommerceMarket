<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personalUser extends Model
{
    use HasFactory;
    protected $table = 'personal_users';

    protected $fillable = ['fname','lname','phonenumber','adress',];
}
