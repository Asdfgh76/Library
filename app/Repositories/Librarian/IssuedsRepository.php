<?php

namespace App\Repositories\Librarian;

use App\Repositories\CoreRepository;
use App\Models\Librarian\Issued as Model;
use Illuminate\Support\Facades\Auth;

/**
 * Репозиторий для работы выданными книгами
 */
class IssuedsRepository extends CoreRepository
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
     * Вывод всех выданных книг
     *
     * @return void
     */
    public function getAllIssued()
    {
        $bookshand = $this->startConditions()
        ->join('books', 'issued.books_id', '=', 'books.id')
        ->join('users', 'issued.user_id', '=', 'users.id')
        ->select('issued.id','issued.created_at','issued.return_date','books.id as book_id','books.title','users.id as user_id','users.login')
        ->toBase()
        ->paginate(10);

        return $bookshand;
    }

    /**
     * Вывод всех выданных книг клиенту
     *
     * @return void
     */
    public function getUserIssued()
    {
        $user_id = Auth::user()->id;
        $bookshand = $this->startConditions()
        ->join('books', 'issued.books_id', '=', 'books.id')
        ->join('users', 'issued.user_id', '=', 'users.id')
        ->select('issued.id','issued.created_at','issued.return_date','books.id as book_id','books.title','users.id as user_id','users.login')
        ->where('issued.user_id', '=', $user_id)
        ->toBase()
        ->paginate(10);

        return $bookshand;
    }

    /**
     * Удаление книги из таблицы "issued"
     *
     * @param  mixed $book_id
     * @return void
     */
    public function delete($book_id)
    {
        $this->startConditions()->where('books_id', '=', $book_id)->delete();
    }
}
