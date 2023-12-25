<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function __invoke(){

        return $this->models['history']::whereBetween('date_end', [Etc::sixMonthBefore(), Etc::dateNow()])
        ->withSum('products', 'price')
        ->withSum('products', 'amount')
        ->get();
    }
}

/* return $this->models['history']::withSum('products', 'price')->find(1)->products_sum_price;
 */
