<!--Страница вывода всех книг библиотеки для клиента-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-10">
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
            @include('library.user.include.nav')
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
                                            <button type = "submit" class = "btn btn-success">Просмотр</button>
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
