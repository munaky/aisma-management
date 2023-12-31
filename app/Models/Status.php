<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name'];
}
