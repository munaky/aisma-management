<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    protected $table = 'product_histories';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['histories_id', 'products_id', 'amount', 'price'];
}
