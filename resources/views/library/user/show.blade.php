<!--Страница подробной информации о книге-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Библиотека</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Подробнее</li>
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
                            @foreach($book as $boo)
                                <tr>
                                    <td>{{ $boo->id }}</td>
                                    <td>{{ $boo->title }}</td>
                                    <td>{{ $boo->author }}</td>
                                    <td>{{ $boo->genre }}</td>
                                    <td>{{ $boo->publishing }}</td>
                                    <td style="font-size:20px">
                                        @if($boo->status == 0)
                                        <span class="col-md-12 badge badge-success">В наличии</span>
                                        @elseif($boo->status == 1)
                                        <span class="col-md-12 badge badge-secondary">Забронированна</span>
                                        @elseif($boo->status == 2)
                                        <span class="col-md-12 badge badge-warning">Выданна</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($boo->status == 0)
                                        <a class="btn btn-xs">
                                            <form method = "POST" action = "{{ route('user.tobook')}}" style="float: none">
                                                @csrf
                                                <input id="book_id" type="hidden"
                                                name="book_id" value="{{ $boo->id }}" >
                                                <button type = "submit" class = "btn btn-default">Забронировать</button>
                                            </form>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
		    </div>
	    </div>
    </div>
</div>
@endsection

