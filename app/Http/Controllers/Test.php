<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function __invoke(){

        return $this->models['history']::whereBetween('date_end', [Etc::oneMonthBefore(), Etc::dateNow()])
        ->with(['products.detail'])
        ->withSum('products', 'price')
        ->withSum('products', 'amount')
        ->first();
    }
}

/* return $this->models['history']::withSum('products', 'price')->find(1)->products_sum_price;
 */
