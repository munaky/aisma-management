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
use App\Models\Employee;
use App\Models\AttendanceHistory;
use App\Models\Card;

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
            'employee' => Employee::class,
            'attendance_history' => AttendanceHistory::class,
            'card' => Card::class,
        ];
    }
}
