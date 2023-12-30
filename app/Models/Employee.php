<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'role_id', 'cards_id'];

    public function role(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function card(){
        return $this->hasOne(Card::class, 'id', 'cards_id');
    }

    public function attendance(){
        return $this->hasOne(AttendanceHistory::class, 'employees_id', 'id');
    }
}
