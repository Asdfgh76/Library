<!--Страница поиска книг-->
@extends('layouts.app')

@section('content')
<div class="container">
    <?php //dd($search);?>
    <div class="row justify-content-center">
		<div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Библиотека</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Поиск книг</li>
                </ol>
            </nav>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            @include('library.user.include.nav')
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <form method="POST" class="form-inline" action="{{ route('user.outputsearch') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            @switch($search)
                            @case('title')
                                <input id="title" type="text" class="form-control"
                                name="val" value="{{ old('title') }}" autofocus placeholder="Поиск по названию">
                                <input type="hidden" name="line" value="books.title">
                                <input type="hidden" name="search" value="title">
                            @break

                            @case('author')
                                <input id="author" type="text" class="form-control"
                                name="val" value="{{ old('author') }}" autofocus placeholder="Поиск по автору">
                                <input type="hidden" name="line" value="author.name">
                                <input type="hidden" name="search" value="author">
                            @break

                            @case('genre')
                                <input id="genre" type="text" class="form-control @error('genre') is-invalid @enderror"
                                name="val" value="{{ old('genre') }}" autofocus placeholder="Поиск по жанру">
                                <input type="hidden" name="line" value="genre.title">
                                <input type="hidden" name="search" value="genre">
                            @break

                            @case('pub')
                                <input id="pub" type="text" class="form-control @error('pub') is-invalid @enderror"
                                name="val" value="{{ old('pub') }}" autofocus placeholder="Поиск по издателю">
                                <input type="hidden" name="line" value="publishing.title">
                                <input type="hidden" name="search" value="pub">
                            @break

                            @default

                            @endswitch
                        </div>
                    </div>
                  <button class="btn btn-success ml-2" type="submit">Search</button>
                </form>
              </nav>
            @if(!empty($books))
		    <div class="card">
                <div class="card-header" style="text-align: center; font-size:20px;">{{ __('Библиотека') }}</div>
			    <div class="card-body">
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Автор</th>
                                <th>Жанр</th>
                                <th>Издательство</th>
                                <th>Статус</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->genre }}</td>
                                    <td>{{ $book->publishing }}</td>
                                    <td style="font-size:20px">
                                        @if($book->status == 0)
                                        <span class="col-md-12 badge badge-success">В наличии</span>
                                        @elseif($book->status == 1)
                                        <span class="col-md-12 badge badge-secondary">Забронированна</span>
                                        @elseif($book->status == 2)
                                        <span class="col-md-12 badge badge-warning">Выданна</span>
                                        @endif
                                    </td>
                                    <td>

                                        <a href = "{{ route('user.show', $book->id)}}">
                                            <button type = "submit" class = "btn btn-success">Подробнее</button>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
            @endif
	    </div>
    </div>
    @if(!empty($books))
    @if($books->total() > $books->count())
<br>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
@endif
@endif
</div>
<?php //dd($errors); ?>
@endsection
