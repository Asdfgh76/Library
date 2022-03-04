@extends('layouts.app')

@section('title','Информация о книге')

@section('content')
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Библиотека</a></li>
              <li class="breadcrumb-item active" aria-current="page">Информация о книге</li>
            </ol>
        </nav>
        <div class="card mb-3" style="width:50rem;">
            <div class="card-header">
                <p class="card-title fs-4">{{ $book->title}}</p>
            </div>
            <div class="row g-0">
                <div class="col-md-6 p-3 mt-3">
                    @if ($book->image)
                                @php($url = url('storage/catalog/book/thumb/' . $book->image))
                                <img src="{{ $url }}" class="card-img-top" alt="...">
                                @else
                                    @php($url = url('storage/catalog/book/thumb/default.jpg'))
                                    <img src="{{ $url }}" alt="" class="card-img-top">
                                @endif
                            <div class="card-img-overlay">
                                @if($book->new)
                                <span class="badge badge-info text-white ml-1">Новинка</span>
                                @endif
                                @if($book->hit)
                                    <span class="badge badge-danger ml-1">Бестселлеры</span>
                                @endif
                                @if($book->recommend)
                                    <span class="badge badge-success ml-1">Рекомендуем</span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body p-2" style="height: 345px;">
                        <p class="card-subtitle mb-1 text-muted">Жанр: {{ $book->genre->title }}</p>
                        <p class="card-subtitle mb-1 text-muted">Автор: {{ $book->author->name }}</p>
                        <p class="card-subtitle mb-1 text-muted">Издательство: {{ $book->publishing->title}}</p>
                        <p class="card_title mb-1 ">О книге:</p>
                        <p class="card-subtitle text-muted overflow-hidden">{{ $book->description}}</p>
                    </div>
                    <div class="card-footer">
                        @if ($book->booked()->exists())
                        <p class="card-subtitle text-muted">Забронированна до: {{$book->booked->end_date}}</p>
                        @else
                        @auth
                        <form action="{{ route('user.addBookedBook', $book) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary col-md-9">Забронировать</button>
                        </form>
                        @endauth
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
