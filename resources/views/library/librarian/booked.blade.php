<!--Страница заброннированных книг-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/librarian">Библиотека</a></li>
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
                                <th>Логин пользователя</th>
                                <th>Дата бронирования</th>
                                <th>Забронированна до:</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($bookeds as $booked)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $booked->books->title }}</td>
                                    <td>{{ $booked->users->login }}</td>
                                    <td>{{ $booked->created_at }}</td>
                                    <td>{{ $booked->end_date }}</td>
                                    <td>
                                        <a class="btn btn-xs">
                                            <form method = "POST" action = "{{ route('librarian.issued')}}" style="float: none">
                                                @csrf
                                                <input id="book_id" type="hidden"
                                                name="book_id" value="{{ $booked->book_id }}" >
                                                <input id="user_id" type="hidden"
                                                name="user_id" value="{{ $booked->user_id }}" >
                                                <button type = "submit" class = "btn btn-success">Выдать</button>
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
                @if($bookeds->total() > $bookeds->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    {{ $bookeds->links() }}
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

