<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Issued extends Model
{

    protected $table = 'issued';

    protected $fillable = [
        'books_id',
        'user_id',
        'created_at',
        'return_date',
    ];
}
