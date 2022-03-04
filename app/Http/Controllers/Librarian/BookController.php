<?php

namespace App\Http\Controllers\Librarian;

use App\Helpers\ImageSaver;
use App\Http\Controllers\Controller;
use App\Models\Librarian\Book;
use App\Models\Librarian\Author;
use App\Models\Librarian\Genre;
use App\Models\Librarian\Publishing;
use App\Http\Requests\Librarian\BookLibrarianRequest;
use Illuminate\Support\Str;

class BookController extends Controller
{
    private $imageSaver;

    public function __construct(ImageSaver $imageSaver) {
        $this->imageSaver = $imageSaver;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('author','genre','publishing')->paginate(10);
        return view('librarian.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishings = Publishing::all();
        return view('librarian.books.create', compact('authors','genres','publishings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookLibrarianRequest $request)
    {
        $data = $request->all();
        $data['description'] = Str::limit($request->description, 409, '[...]');
        $data['image'] = $this->imageSaver->upload($request, null, 'book');
        if (Book::create($data)) {
            return redirect()->route('librarian.book.index')
                    ->with('success','Книга добавлена');
        }else{
            return back()
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('librarian.books.show ', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishings = Publishing::all();
        return view('librarian.books.edit ', compact('book','authors','genres','publishings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookLibrarianRequest $request, Book $book)
    {
        $input = $request->all();
        $input['description'] = ltrim(Str::limit($request->description, 409, '...'));
        if($request->empty == 'empty'){
            $input['image'] = NULL;
        }else{
            $input['image'] = $this->imageSaver->upload($request, $book, 'book');
        }
        $book->update($input);
        return redirect()->route('librarian.book.index')
                        ->with('success','Книга успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()
            ->route('librarian.book.index')
            ->with('success', 'Книга успешно удалена');
    }
}
