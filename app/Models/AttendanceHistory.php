<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceHistory extends Model
{
    protected $table = 'attendance_histories';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['employees_id', 'date_start', 'date_end'];
}
