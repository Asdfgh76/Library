@extends('librarian.layouts.app')

@section('title','Забронированные книги')

@section('content')
<div class="col-md-10">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('librarian.book.index')}}">Библиотека</a></li>
          <li class="breadcrumb-item active" aria-current="page">Забронированные книги</li>
        </ol>
    </nav>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
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
                        <th>Забронированна до:</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookedBooks as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->genre->title }}</td>
                            <td>{{ $book->publishing->title }}</td>
                            <td>



                            </td>
                            <td>
                                <a href = "{{ route('showbook', $book)}}">
                                    <button type = "submit" class = "btn btn-success">Просмотр</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>
@if($bookedBooks->total() > $bookedBooks->count())
<br>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                {{ $bookedBooks->links() }}
            </div>
        </div>
    </div>
</div>
@endif
@endsection
