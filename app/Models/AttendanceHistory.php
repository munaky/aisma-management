<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceHistory extends Model
{
    protected $table = 'attendance_histories';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['employees_id', 'time', 'date'];

    public function employee(){
        return $this->hasOne(Employee::class, 'id', 'employees_id');
    }
}
