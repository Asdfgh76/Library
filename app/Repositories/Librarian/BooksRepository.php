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

    public function getAllBooks()
    {
        $books = $this->startConditions()
        ->join('genre', 'books.genre_id', '=', 'genre.id')
            ->join('author', 'books.author_id', '=', 'author.id')
            ->join('publishing', 'books.publishing_id', '=', 'publishing.id')
            ->select('books.id','books.title','books.status','genre.title as genre', 'author.name as author','publishing.title as publishing')
            ->orderBy('books.id', 'asc')
            ->toBase()
            ->paginate(10);

        return $books;
    }

    public function searchTitle($val,$line)
    {
        $books = $this->startConditions($val)
        ->join('genre', 'books.genre_id', '=', 'genre.id')
            ->join('author', 'books.author_id', '=', 'author.id')
            ->join('publishing', 'books.publishing_id', '=', 'publishing.id')
            ->select('books.id','books.title','books.status','genre.title as genre', 'author.name as author','publishing.title as publishing')
            ->where($line, 'like', "%$val%")
            ->orderBy('books.id', 'asc')
            ->toBase()
            ->paginate(10);

        return $books;
    }

    public function showBook($id)
    {
        $books = $this->startConditions()
        ->join('genre', 'books.genre_id', '=', 'genre.id')
            ->join('author', 'books.author_id', '=', 'author.id')
            ->join('publishing', 'books.publishing_id', '=', 'publishing.id')
            ->select('books.id','books.title','books.status','genre.title as genre', 'author.name as author','publishing.title as publishing')
            ->where('books.id', '=', $id)
            ->toBase()
            ->get();

        return $books;
    }
}
