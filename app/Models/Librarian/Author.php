<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';

    protected $fillable = [
        'name',
    ];

    public function books()
    {
        return $this->hasMany(Books::class);
    }

}
