<!--Главная страница библиотекаря-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Библиотека</li>
                </ol>
            </nav>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            <nav class="navbar navbar-expand-sm bg-light justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a href = "{{ route('librarian.create')}}" class="btn btn-xs">
                            <button type = "submit" class = "btn btn-success">Добавить книгу</button>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href = "{{ route('librarian.booked') }}" class="btn btn-xs">
                        <button type = "submit" class = "btn btn-info">Забронированные книги</button>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href = "{{ route('librarian.bookshand') }}" class="btn btn-xs">
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
                                <th>#</th>
                                <th>Название</th>
                                <th>Автор</th>
                                <th>Жанр</th>
                                <th>Издательство</th>
                                <th>Статус</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->genre }}</td>
                                    <td>{{ $book->publishing }}</td>
                                    <td style="font-size:17px">
                                        @if($book->status == 0)
                                        <span class="badge badge-success col-md-12">В наличии</span>
                                        @elseif($book->status == 1)
                                        <span class="badge badge-secondary col-md-12">Забронированна</span>
                                        @elseif($book->status == 2)
                                        <span class="badge badge-warning col-md-12">Выданна</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-xs">
                                        <form method = "POST" action = "{{ route('librarian.destroy', $book->id)}}" style="float: none">
                                            @method('DELETE')
                                            @csrf
                                            <button type = "submit" class = "btn btn-danger">Удалить</button>
                                        </form>
                                    </a>
                                    </td>
                                </tr>
                                @php $i=$i+1 @endphp
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
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
</div>
<?php //dd($errors); ?>
@endsection
