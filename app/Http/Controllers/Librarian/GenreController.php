<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Librarian\Genre;
use App\Http\Requests\Librarian\GenreLibrarianRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::paginate(10);
        return view('librarian.genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarian.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreLibrarianRequest $request)
    {

        if (Genre::create($request->input())) {
            return redirect()->route('librarian.genre.index')
                    ->with('success','Жанр добавлен');
        }else{
            return back()
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Librarian\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return view('librarian.genre.show ', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Librarian\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('librarian.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Librarian\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreLibrarianRequest $request, Genre $genre)
    {
        $input = $request->all();
        $genre->update($input);
        return redirect()->route('librarian.genre.index')
                        ->with('success','Жанр успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Librarian\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        if ($genre->books->count()) {
            return back()->withErrors('Нельзя удалить жанр, у которого есть книги');
        }
        $genre->delete();
        return redirect()
            ->route('librarian.genre.index')
            ->with('success', 'Жанр успешно удален');
    }
}
