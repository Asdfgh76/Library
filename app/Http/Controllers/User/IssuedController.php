<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Issued;
use App\Models\Librarian\Book;
use App\Models\Librarian\Booked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssuedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function addIssuedBook(Book $book)
    {
        $book = Booked::insert([
            'book_id' => $book->id,
            'user_id' => Auth::user()->id,
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
