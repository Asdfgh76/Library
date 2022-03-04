<?php

namespace App\Http\Controllers\Librarian;

use App\Models\librarian\Author;
use App\Http\Controllers\Controller;
use App\Http\Requests\Librarian\AuthorLibrarianRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate(10);
        return view('librarian.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarian.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorLibrarianRequest $request)
    {
        if (Author::create($request->input())) {
            return redirect()->route('librarian.author.index')
                    ->with('success','Автор добавлен');
        }else{
            return back()
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('librarian.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('librarian.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorLibrarianRequest $request, Author $author)
    {
        $input = $request->all();
        $author->update($input);
        return redirect()->route('librarian.author.index')
                        ->with('success','Данные автора успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if ($author->books->count()) {
            return back()->withErrors('Нельзя удалить автора, у которого есть книги');
        }
        $author->delete();
        return redirect()
            ->route('librarian.author.index')
            ->with('success', 'Автор успешно удален');
    }
}
