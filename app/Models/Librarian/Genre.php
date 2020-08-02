<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
    protected $fillable = [
        'title',
    ];

    /**
     * Вывод всех жанров
     *
     * @return void
     */
    public function getAllGenres()
    {
        $genre = DB::table('Genre')->select('id','title')->get();
        return $genre;
    }

    /**
     * Сохранение нового жанра
     *
     * @param  mixed $title
     * @return void
     */
    public function saveGenre($title)
    {
        DB::table('genre')->insert(
            ['title' => $title]
          );
    }

    /**
     * Проверка жанра по названию
     *
     * @param  mixed $title
     * @return void
     */
    public function checkGenre($title)
    {
        $genre = DB::table('genre')->where('title', '=', $title)->get();
        return $genre;
    }
}
