<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
    protected $fillable = [
        'title',
    ];

    public function getAllGenres()
    {
        $genre = DB::table('Genre')->select('id','title')->get();
        return $genre;
    }
}
