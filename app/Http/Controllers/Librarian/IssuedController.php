<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Librarian\Issued;
use App\Http\Requests\Librarian\IssuedAddRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class IssuedController extends Controller
{
    /**
     * Изменение статуса книги на "Выданна"
     *
     * @return void
     */
    public function issued(IssuedAddRequest $request)
    {
        $status = '2';
        $issueds = Issued::create([
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
        $this->booksRepository->updatedStatus($request->book_id,$status);
        return redirect('/librarian/booked')->withSuccess ('Книга выдана');
       }
    }
    /**
     * Вывод выданных пользователям книг из библиотеки
     *
     * @return void
     */
    public function bookshand()
    {
        $bookshand = $this->issuedRepository->getAllIssued();
        //dd($bookshand);

        return view('library.librarian.bookshand', compact('bookshand'));
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issuedBooks = Issued::paginate(10);
        return view('librarian.books.issued', compact('issuedBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Librarian\Issued  $issued
     * @return \Illuminate\Http\Response
     */
    public function show(Issued $issued)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Librarian\Issued  $issued
     * @return \Illuminate\Http\Response
     */
    public function edit(Issued $issued)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Librarian\Issued  $issued
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issued $issued)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Librarian\Issued  $issued
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issued $issued)
    {
        //
    }
}
