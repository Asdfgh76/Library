<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Booked extends Model
{

    protected $table = 'booked';

    protected $fillable = [
        'book_id',
        'user_id',
    ];

    public function books()
    {
        return $this->belongsTo(Book::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
