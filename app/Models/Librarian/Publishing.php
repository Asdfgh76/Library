<?php

namespace App\Models\Librarian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Publishing extends Model
{
    protected $fillable = [
        'title',
    ];

    /**
     * Вывод всех издателей
     *
     * @param  mixed $title
     * @return void
     */
    public function getAllPublishings()
    {
        $publishing = DB::table('publishing')->select('id','title')->get();
        return $publishing;
    }

    /**
     * Сохранение нового издателя
     *
     * @param  mixed $title
     * @return void
     */
    public function savePublishing($title)
    {
        DB::table('publishing')->insert(
            ['title' => $title]
          );
    }

    /**
     * Проверка издателя по названию
     *
     * @param  mixed $title
     * @return void
     */
    public function checkPublishing($title)
    {
        $Publishing = DB::table('publishing')->where('title', '=', $title)->get();
        return $Publishing;
    }
}
