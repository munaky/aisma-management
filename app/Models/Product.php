<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['image', 'name', 'size', 'unit', 'stock', 'price', 'description'];
}
