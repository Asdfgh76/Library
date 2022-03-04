@extends('layouts.app')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@include('include.search')
@auth
<nav class="navbar navbar-expand-sm bg-light justify-content-center">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a href = "{{ route('user.bookedBook') }}" class="btn btn-xs">
            <button type = "submit" class = "btn btn-info">Забронированные книги</button>
        </a>
        </li>
        <li class="nav-item">
        <a href = "" class="btn btn-xs">
            <button type = "submit" class = "btn btn-info">Полученные книги</button>
        </a>
        </li>
    </ul>
</nav>
@endauth
<div class="container">
    <div class="row d-flex justify-content-center">
            @foreach($books as $book)
            @include('include.card', compact('book'))
            @endforeach
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

@endsection
