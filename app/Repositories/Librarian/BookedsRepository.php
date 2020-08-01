<?php

namespace App\Repositories\Librarian;

use App\Repositories\CoreRepository;
use App\Models\Librarian\Booked as Model;
use Illuminate\Support\Facades\Auth;

/**
 * Репозиторий для работы заброннированными книгами
 */
class BookedsRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllBooked()
    {
        $bookeds = $this->startConditions()
        ->join('books', 'booked.books_id', '=', 'books.id')
        ->join('users', 'booked.user_id', '=', 'users.id')
        ->select('booked.id','books.id as book_id','booked.created_at','booked.end_date','books.title','users.id as user_id','users.login')
        ->toBase()
        ->paginate(10);

        return $bookeds;
    }

    public function delete($books_id)
    {
        $this->startConditions()->where('books_id', '=', $books_id)->delete();
    }

    /**
     * Вывод заброннированных пользователем книг
     *
     * @return void
     */
    public function userBooked()
    {
        $user_id = Auth::user()->id;
        $bookeds = $this->startConditions()
        ->join('books', 'booked.books_id', '=', 'books.id')
        ->join('users', 'booked.user_id', '=', 'users.id')
        ->select('booked.id','books.id as book_id','booked.created_at','booked.end_date','books.title','users.id as user_id','users.login')
        ->where('booked.user_id', '=', $user_id)
        ->toBase()
        ->paginate(10);

        return $bookeds;
    }
}
