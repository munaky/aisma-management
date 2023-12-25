<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['destination', 'date_start', 'date_end', 'status_id'];

    public function products(){
        return $this->hasMany(ProductHistory::class, 'histories_id');
    }
}
