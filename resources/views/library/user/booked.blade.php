<!--Страница забронированых книг клиента-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/user">Библиотека</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Забронированные книги</li>
                </ol>
            </nav>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
		    <div class="card">
			    <div class="card-body">
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Название книги</th>
                                <th>Дата бронирования</th>
                                <th>Забронированна до:</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->created_at }}</td>
                                    <td>{{ $book->end_date }}</td>
                                    <td>
                                        <a class="btn btn-xs">
                                            <form method = "POST" action = "{{ route('user.destroybooked', $book->book_id)}}" style="float: none">
                                                @csrf
                                                <button type = "submit" class = "btn btn-danger">Убрать бронь</button>
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
                @if($books->total() > $books->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    {{ $books->links() }}
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

