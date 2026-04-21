<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    protected $fillable = ['name', 'brand', 'size', 'price', 'stock'];
}
