<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Author extends Model
{
    protected $fillable = [
        'name',
    ];

    public function getAllAuthor()
    {
        $author = DB::table('author')->select('id','name')->get();
        return $author;
    }
}
