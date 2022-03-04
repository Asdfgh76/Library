<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Librarian\Publishing;
use Illuminate\Http\Request;
use App\Http\Requests\Librarian\PublishingLibrarianRequest;

class PublishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishings = Publishing::paginate(10);
        return view('librarian.publishing.index', compact('publishings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarian.publishing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublishingLibrarianRequest $request)
    {
        if (Publishing::create($request->input())) {
            return redirect()->route('librarian.publishing.index')
                    ->with('success','Издательство добавлено');
        }else{
            return back()
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Librarian\Publishing  $publishing
     * @return \Illuminate\Http\Response
     */
    public function show(Publishing $publishing)
    {
        return view('librarian.publishing.show ', compact('publishing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Librarian\Publishing  $publishing
     * @return \Illuminate\Http\Response
     */
    public function edit(Publishing $publishing)
    {
        return view('librarian.publishing.edit', compact('publishing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Librarian\Publishing  $publishing
     * @return \Illuminate\Http\Response
     */
    public function update(PublishingLibrarianRequest $request, Publishing $publishing)
    {
        $input = $request->all();
        $publishing->update($input);
        return redirect()->route('librarian.publishing.index')
                        ->with('success','Издательство успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Librarian\Publishing  $publishing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publishing $publishing)
    {
        if ($publishing->books->count()) {
            return back()->withErrors('Нельзя удалить издательство, у которого есть книги');
        }
        $publishing->delete();
        return redirect()
            ->route('librarian.publishing.index')
            ->with('success', 'Издательство успешно удалено');
    }
}
