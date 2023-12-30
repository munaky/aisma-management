<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function __invoke(){

        return $this->models['attendance_history']::with(['employee.role'])->get();
    }
}

/* return $this->models['history']::withSum('products', 'price')->find(1)->products_sum_price;
 */
