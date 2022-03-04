<?php

namespace App\Http\Controllers\User;

use App\Models\Librarian\Booked;
use App\Models\Librarian\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookedBooks()
    {
        $bookedBooks = Book::with('author','genre','publishing','booked')->whereHas('booked', function ($query) {
            $query->where('user_id', '=', Auth::id());
        })->paginate(10);
        return view('user.booked', compact('bookedBooks'));
    }

    public function addBookedBook(Book $book)
    {
        $book = Booked::insert([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'end_date' => Carbon::now()->addDays(3),
        ]);
        if($book){
            return redirect()->route('home')
                            ->with('success','Книга забронированна');
        }else{
            return redirect()->route('home')
                            ->with('danger','Не удалось забронировать книгу');
        }
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
     * @param  \App\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function show(Booked $booked)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function edit(Booked $booked)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booked $booked)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booked $booked)
    {
        //
    }
}
