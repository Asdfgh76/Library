<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'id',
    ];

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
