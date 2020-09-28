<!--Страница полученных книг клиента-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/user">Библиотека</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Книги на руках</li>
                </ol>
            </nav>

		    <div class="card">
			    <div class="card-body">
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                            <tr>
                                <th>Название книги</th>
                                <th>Дата выдачи</th>
                                <th>Дата возврата</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($bookshand as $bookhand)
                                <tr>
                                    <td>{{ $bookhand->books->title }}</td>
                                    <td>{{ $bookhand->created_at }}</td>
                                    <td>{{ $bookhand->return_date }}</td>
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



