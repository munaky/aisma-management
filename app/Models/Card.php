<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['uid'];
}
