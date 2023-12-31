<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['company', 'company_address', 'contact', 'client', 'client_address', 'director', 'manager', 'sent_via', 'driver_name', 'date', 'serial_number', 'serial_desc', 'total', 'total_word', 'date_start', 'date_end', 'status_id'];

    public function products(){
        return $this->hasMany(ProductHistory::class, 'histories_id');
    }

    public function status(){
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
