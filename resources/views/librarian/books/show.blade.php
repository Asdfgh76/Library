@extends('librarian.layouts.app')

@section('title','Информация о книге')

@section('content')
    <div class="col-md-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('librarian.book.index')}}">Библиотека</a></li>
              <li class="breadcrumb-item active" aria-current="page">Информация о книге</li>
            </ol>
          </nav>
        <table class="table table-borderless" style="text-align: center">
            <thead>
                <tr>

                    <th>Название</th>
                    <th>Автор</th>
                    <th>Жанр</th>
                    <th>Издательство</th>
                    <th>Описание</th>
                    <th>Статус</th>
                    <th>Изображение</th>
                </tr>
            </thead>
            <tbody>
                    <tr>

                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->genre->title }}</td>
                        <td>{{ $book->publishing->title }}</td>
                        <td><textarea>{{ $book->description }}</textarea></td>
                        <td style="font-size:20px">
                            @if($book->status == 0)
                            <span class="badge badge-success col-md-12">В наличии</span>
                            @elseif($book->status == 1)
                            <span class="badge badge-secondary col-md-12">Забронированна</span>
                            @elseif($book->status == 2)
                            <span class="badge badge-warning col-md-12">Выданна</span>
                            @endif
                        </td>
                        <td style="width: 20%">
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
                            <a class="btn btn-xs">
                            <form method = "POST" action = "{{ route('librarian.book.destroy', $book->id)}}" style="float: none">
                                @method('DELETE')
                                @csrf
                                <button type = "submit" class = "btn btn-danger">Удалить</button>
                            </form>
                        </a>
                        </td>
                    </tr>
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
    <div class="d-flex flex-row mb-3 justify-content-center">
        <a href="{{ route('librarian.book.index', $book) }}" class="btn btn-primary mr-1">Назад</a>
@endsection
