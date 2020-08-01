<?php

namespace App\Http\Controllers\Library\Librarian;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Library\Librarian\BaseController;
use App\Repositories\Librarian\BooksRepository;
use App\Repositories\Librarian\BookedsRepository;
use App\Repositories\Librarian\IssuedsRepository;
use App\Models\Librarian\Books;
use App\Models\Librarian\Issued;
use App\Models\Librarian\Author;
use App\Models\Librarian\Genre;
use App\Models\Librarian\Publishing;

/**
 * Контроллер библиотекаря для работы с книгами.
 */
class BooksController extends BaseController
{

    private $booksRepository;
    private $bookedRepository;
    private $issuedRepository;
    private $authors;
    private $genres;
    private $publishings;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->booksRepository = app(BooksRepository::class);
        $this->bookedRepository = app(BookedsRepository::class);
        $this->issuedRepository = app(IssuedsRepository::class);
        //$this->books = app(Books::class);
        $this->authors = app(Author::class);
        $this->genres = app(Genre::class);
        $this->publishings = app(Publishing::class);

    }
    /**
     * Вывод всех книг в библиотеке.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->booksRepository->getAllBooks();

        return view('library.librarian.index', compact('books'));
    }

    /**
     * Вывод формы для добавления новой книги.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = $this->authors->getAllAuthor();
        $genres = $this->genres->getAllGenres();
        $publishings = $this->publishings->getAllPublishings();
        return view('library.librarian.create', compact('authors','genres','publishings'));
    }

    /**
     * Сохранение новой книги.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Books::create([
            'title' => $request->title,
            'genre_id' => $request->genre,
            'publishing_id' => $request->publishing,
            'author_id' => $request->author,
        ]);

        if(!$book){
            return back()
            ->withFail('Ошибка!')
            ->withInput();
        }else{
            return redirect('/librarian')->withSuccess ('Книга добавлена');
        }
    }

    /**
     * Удаление книги.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->booksRepository->getDelete($id);

        return redirect('/librarian');
    }

    /**
     * Вывод забронированных пользователями книг в библиотеке
     *
     * @return void
     */
    public function booked()
    {
        $bookeds = $this->bookedRepository->getAllBooked();
        return view('library.librarian.booked', compact('bookeds'));
    }

    /**
     * Вывод выданных пользователям книг из библиотеки
     *
     * @return void
     */
    public function bookshand()
    {
        $bookshand = $this->issuedRepository->getAllIssued();

        return view('library.librarian.bookshand', compact('bookshand'));
    }

    /**
     * Удаление книги.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyBooked($id)
    {
        $this->bookedRepository->getDelete($id);

        return redirect('/librarian');
    }

    /**
     * Изменение статуса книги на "Выданна"
     *
     * @return void
     */
    public function issued(Request $request)
    {
       $issueds = Issued::insert([
        'books_id' => $request->book_id,
        'user_id' => $request->user_id,
        'created_at' => now(),
        'return_date' => Carbon::now()->addDays(10),
        ]);

       if(!$issueds){
        return back()
        ->withFail('Ошибка!');
       }else{
        $this->bookedRepository->delete($request->book_id);
        return redirect('/librarian/booked')->withSuccess ('Книга выдана');
       }
    }

    /**
     * Функция возврата книги в библиотеку
     *
     * @param  mixed $id
     * @return void
     */
    public function accepted($id)
    {
        $this->issuedRepository->getDelete($id);

        return redirect('/librarian/bookshand');
    }
}
