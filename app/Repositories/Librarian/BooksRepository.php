<?php

namespace App\Repositories\Librarian;

use App\Repositories\CoreRepository;
use App\Models\Librarian\Books as Model;

/**
 * Репозиторий для работы с книгами в библиотеке
 */
class BooksRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Вывод всех книг в библиотеке
     *
     * @return void
     */
    public function getAllBooks()
    {

        /*$books = $this->startConditions()
            ->join('genre', 'books.genre_id', '=', 'genre.id')
            ->join('author', 'books.author_id', '=', 'author.id')
            ->join('publishing', 'books.publishing_id', '=', 'publishing.id')
            ->select('books.id','books.title','books.status','genre.title as genre', 'author.name as author','publishing.title as publishing')
            ->orderBy('books.id', 'asc')
            ->toBase()
            ->paginate(10);
            /*$books = $this->startConditions()
            //->with('author','genre','publishing')
            ->with([
                'author' => function ($query){
                $query->select(['id','name']);
            },
                'genre' => function ($query){
                $query->select(['id','title']);
            },
                'publishing' => function ($query){
                $query->select(['id','title']);
            }
            ])
            ->paginate(10);*/
            $books = $this->startConditions()
            ->with([
                'author' => function ($query){
                $query->select(['id','name']);
            },
                'genre' => function ($query){
                $query->select(['id','title']);
            },
                'publishing' => function ($query){
                $query->select(['id','title']);
            }
            ])
            ->paginate(10);
            //dd($books);
        return $books;
    }

    /**
     * Поиск книг
     *
     * @param  mixed $val
     * @param  mixed $line
     * @return void
     */
    public function searchTitle($val, $line, $search)
    {
        /*$books = $this->startConditions()
            ->join('genre', 'books.genre_id', '=', 'genre.id')
            ->join('author', 'books.author_id', '=', 'author.id')
            ->join('publishing', 'books.publishing_id', '=', 'publishing.id')
            ->select('books.id','books.title','books.status','genre.title as genre', 'author.name as author','publishing.title as publishing')
            ->where($line, 'like', "%$val%")
            ->orderBy('books.id', 'asc')
            ->toBase()
            ->paginate(10);*/

            if ($search == 'title') {
            $books = $this->startConditions()
            ->with([
                'author' => function ($query){
                $query->select(['id','name']);
            },
                'genre' => function ($query){
                $query->select(['id','title']);
            },
                'publishing' => function ($query){
                $query->select(['id','title']);
            }
            ])
            ->where($line, 'like', "%$val%")
            ->paginate(10);
            }else{
            $books = $this->startConditions()
            ->with([
                'author' => function ($query){
                $query->select(['id','name']);
            },
                'genre' => function ($query){
                $query->select(['id','title']);
            },
                'publishing' => function ($query){
                $query->select(['id','title']);
            }
            ])
            ->whereHas($search,function ($query) use ($line,$val) {
                $query->where($line, 'like', "%$val%");
              })
            ->paginate(10);
            }

        return $books;
    }

    /**
     * Просмотр книги
     *
     * @param  mixed $id
     * @return void
     */
    public function showBook($id)
    {
        /*$books = $this->startConditions()
            ->join('genre', 'books.genre_id', '=', 'genre.id')
            ->join('author', 'books.author_id', '=', 'author.id')
            ->join('publishing', 'books.publishing_id', '=', 'publishing.id')
            ->select('books.id','books.title','books.status','genre.title as genre', 'author.name as author','publishing.title as publishing')
            ->where('books.id', '=', $id)
            ->toBase()
            ->get();*/
            $book = $this->startConditions()
            ->with([
                'author' => function ($query){
                $query->select(['id','name']);
            },
                'genre' => function ($query){
                $query->select(['id','title']);
            },
                'publishing' => function ($query){
                $query->select(['id','title']);
            }
            ])
            ->where('id', '=', $id)
            ->get();

        return $book;
    }

    /**
     * Обновление статуса книги
     *
     * @param  mixed $id
     * @param  mixed $status
     * @return void
     */
    public function updatedStatus($id,$status)
    {
        $this->startConditions()
            ->where('id', '=', $id)
            ->update(['status' => $status]);
    }

    public  function scopeLike($query, $field, $value)
    {
        return $query->where($field, 'LIKE', "%$value%");
    }
}
