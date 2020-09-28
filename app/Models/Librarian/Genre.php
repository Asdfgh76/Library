<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';

    protected $fillable = [
        'title',
    ];

    public function books()
    {
        return $this->hasMany(Books::class);
    }

}
