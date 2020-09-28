<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Booked extends Model
{

    protected $table = 'booked';

    protected $fillable = [
        'books_id',
        'user_id',
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
