<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public $timestamps = false;

    public function user()
{
    return $this->hasMany('App\Models\User');
}
}
