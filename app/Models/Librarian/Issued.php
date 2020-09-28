<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Issued extends Model
{
    const UPDATED_AT = 'return_date';

    protected $table = 'issued';

    protected $fillable = [
        'books_id',
        'user_id',
        'created_at',
        'return_date',
    ];

    public function books()
    {
        return $this->belongsTo(Books::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
