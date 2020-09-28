<?php

namespace App\Http\Controllers\Library\User;

use App\Http\Requests\Librarian\SearchBooksRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Library\User\BaseController;
use App\Repositories\Librarian\BooksRepository;
use App\Repositories\Librarian\BookedsRepository;
use App\Repositories\Librarian\IssuedsRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\Librarian\Booked;
use App\Models\Librarian\Books;

class UserController extends BaseController
{

    private $booksRepository;
    private $bookedRepository;
    private $issuedRepository;

    public function __construct()
    {
        parent::__construct();
        $this->booksRepository = app(BooksRepository::class);
        $this->bookedRepository = app(BookedsRepository::class);
        $this->issuedRepository = app(IssuedsRepository::class);
    }

    /**
     * Вывод всех книг в библиотеке.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->booksRepository->getAllBooks();

        return view('library.user.index', compact('books'));
    }

    /**
     * Подробнная информация о книге.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $book = $this->booksRepository->showBook($id);
         if(!$book){
            return back()
            ->withFail('Ошибка!');
        }else{
            return view('library.user.show', compact('book'));
        }
    }

    /**
     * Функция бронированния книги пользователем
     *
     * @param  mixed $request
     * @return void
     */
    public function toBook(Request $request)
    {
        $user = Auth::user()->id;
        $book = Booked::insert([
            'books_id' => $request->book_id,
            'user_id' => $user,
            'created_at' => now(),
            'end_date' => Carbon::now()->addDays(3),
        ]);

        if(!$book){
            return back()
            ->withFail('Ошибка!');
        }else{
            $book = Books::find($request->book_id);
            $book->status = '1';
            $book->save();

            return redirect('/user')->withSuccess('Книга забронированна');
        }
    }

    /**
     * Вывод заброннированных пользователем книг
     *
     * @return void
     */
    public function booked()
    {
        $books = $this->bookedRepository->userBooked();

        return view('library.user.booked', compact('books'));
    }

    /**
     * Удаленние "брони" книги пользователем
     *
     * @return void
     */
    public function destroyBooked($book_id)
    {
        $this->bookedRepository->delete($book_id);
        $book = Books::find($book_id);
            $book->status = '0';
            $book->save();

        return redirect('/user');
    }

    /**
     * Вывод полученных книг пользователем
     *
     * @return void
     */
    public function bookshand()
    {
        $bookshand = $this->issuedRepository->getUserIssued();

        return view('library.user.bookshand', compact('bookshand'));
    }

    /**
     * Страница поиска книг
     *
     * @return void
     */
    public function search(Request $request)
    {
        $search = $request->search;

        return view('library.user.search', compact('search'));
    }

    /**
     * Вывод результата поиска книг пользователю
     *
     * @return void
     */
    public function outputsearch(SearchBooksRequest $request)
    {

        $books = $this->booksRepository->searchTitle($request->val,$request->line,$request->search);
        $search = $request->search;

            if(count($books)==0){
                return view('library.user.search', compact('search'));
            }else{
                return view('library.user.search', compact('books','search'));
            }
    }
}
