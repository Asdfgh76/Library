<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Publishing extends Model
{
    protected $table = 'publishing';

    protected $fillable = [
        'title',
    ];

    public function books()
    {
        return $this->hasMany(Books::class);
    }

}
