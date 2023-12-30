<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'role_id', 'card_id'];
}
