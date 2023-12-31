<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function __invoke(){
        $dateNow = Etc::dateNow();
        $oneMonthBefore = Etc::oneMonthBefore();
        $oneYearBefore = Etc::oneYearBefore();
        return $this->models['history']::with('products.detail')
        ->withSum('products', 'price')
        ->withSum('products', 'amount')
        ->get();;
    }
}

/* return $this->models['history']::withSum('products', 'price')->find(1)->products_sum_price;
 */
