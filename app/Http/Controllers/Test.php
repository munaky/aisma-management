<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function __invoke(){

        return $this->models['history']::with('products.detail')->find(12);
    }
}

/* return $this->models['history']::withSum('products', 'price')->find(1)->products_sum_price;
 */
