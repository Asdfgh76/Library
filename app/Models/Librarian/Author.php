<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Author extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Вывод всех авторов
     *
     * @return void
     */
    public function getAllAuthor()
    {
        $author = DB::table('author')->select('id','name')->get();
        return $author;
    }

    /**
     * Сохранение нового автора
     *
     * @param  mixed $name
     * @return void
     */
    public function saveAuthor($name)
    {
        DB::table('author')->insert(
            ['name' => $name]
          );
    }

    /**
     * Проверка на совпадение данных автора
     *
     * @param  mixed $name
     * @return void
     */
    public function checkAuthor($name)
    {
        $author = DB::table('author')->where('name', '=', $name)->get();
        return $author;
    }
}
