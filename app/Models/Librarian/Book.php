<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'genre_id',
        'publishing_id',
        'author_id',
        'status',
        'image',
        'description'
    ];

    public function booked()
    {
        return $this->hasOne(Booked::class);
    }

    public function issued()
    {
        return $this->hasOne(Issued::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function publishing()
    {
        return $this->belongsTo(Publishing::class);
    }

}
