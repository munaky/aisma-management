<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/* Models */
use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Models\History;
use App\Models\ProductHistory;
use App\Models\Employee;
use App\Models\AttendanceHistory;
use App\Models\Card;
use App\Models\Status;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $models;

    public function __construct(){
        $this->models = [
            'role' => Role::class,
            'user' => User::class,
            'product' => Product::class,
            'history' => History::class,
            'product_history' => ProductHistory::class,
            'employee' => Employee::class,
            'attendance_history' => AttendanceHistory::class,
            'card' => Card::class,
            'status' => Status::class,
        ];
    }
}
