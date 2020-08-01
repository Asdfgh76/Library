<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Books extends Model
{

    protected $fillable = [
        'title',
        'genre_id',
        'publishing_id',
        'author_id',
        'status'
    ];

}
