@extends('librarian.layouts.app')

@section('title','Книги')

@section('content')
<div class="col-md-10">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a href = "{{ route('librarian.book.create')}}" class="btn btn-xs">
                    <button type = "submit" class = "btn btn-success">Добавить книгу</button>
            </a>
            </li>
            <li class="nav-item">
            <a href = "{{ route('librarian.bookedBook')}}" class="btn btn-xs">
                <button type = "submit" class = "btn btn-info">Забронированные книги</button>
            </a>
            </li>
            <li class="nav-item">
            <a href = "" class="btn btn-xs">
                <button type = "submit" class = "btn btn-info">Выданные книги</button>
            </a>
            </li>
        </ul>
        </nav>
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
                        <th>Изображение</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($books as $book)
                        <tr>

                            <td><a href="{{ route('librarian.book.show', $book->id)}}">{{ $book->title }}</a></td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->genre->title }}</td>
                            <td>{{ $book->publishing->title }}</td>
                            <td style="font-size:20px">
                                @if($book->status == 0)
                                <span class="badge badge-success col-md-12">В наличии</span>
                                @elseif($book->status == 1)
                                <span class="badge badge-secondary col-md-12">Забронированна</span>
                                @elseif($book->status == 2)
                                <span class="badge badge-warning col-md-12">Выданна</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    if ($book->image) {
                                        $url = url('storage/catalog/book/image/' . $book->image);
                                    } else {
                                        $url = url('storage/catalog/book/image/default.jpg');
                                    }
                                @endphp
                                <img src="{{ $url }}" alt="" class="img-fluid">

                            </td>
                            <td>
                                <a href = "{{ route('librarian.book.edit',$book->id)}}" class="btn btn-xs">
                                    <button type = "submit" class = "btn btn-success">Редактировать</button>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-xs">
                                <form method = "POST" action = "{{ route('librarian.book.destroy', $book->id)}}" style="float: none">
                                    @method('DELETE')
                                    @csrf
                                    <button type = "submit" class = "btn btn-danger">Удалить</button>
                                </form>
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
<?php //dd($errors); ?>
@endsection
