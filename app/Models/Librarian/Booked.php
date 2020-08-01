<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{

    protected $table = 'booked';

    protected $fillable = [
        'books_id',
        'user_id',
    ];
}
