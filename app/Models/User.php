<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'role_id', 'username', 'password'];

    public function role() {
        return $this->belongsTo(Role::class);
    }
}
