<!--Страница выданных книг-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/librarian">Библиотека</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Выданные книги</li>
                </ol>
              </nav>
		    <div class="card">
			    <div class="card-body">
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                            <tr>
                                <th>Название книги</th>
                                <th>Логин пользователя</th>
                                <th>Дата выдачи</th>
                                <th>Дата возврата</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookshand as $bookhand)
                                <tr>
                                    <td>{{ $bookhand->books->title }}</td>
                                    <td>{{ $bookhand->users->login }}</td>
                                    <td>{{ $bookhand->created_at }}</td>
                                    <td>{{ $bookhand->return_date }}</td>
                                    <td>
                                        <a class="btn btn-xs" href = "{{ route('librarian.accepted', $bookhand->books_id)}}">
                                        <button type = "button" class = "btn btn-success">Принять</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>

                </div>
                @if($bookshand->total() > $bookshand->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    {{ $bookshand->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
            </div>

	    </div>
    </div>

</div>
@endsection



