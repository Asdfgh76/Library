<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Publishing extends Model
{
    protected $fillable = [
        'title',
    ];

    public function getAllPublishings()
    {
        $publishing = DB::table('publishing')->select('id','title')->get();
        return $publishing;
    }
}
