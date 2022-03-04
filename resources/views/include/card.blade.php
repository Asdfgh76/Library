<div class="col-md-3 d-flex p-2" style="height:450px;width:16rem;">
    <div class="card text-center border-secondary" style="width: 15rem;">
        @php
            if ($book->image) {
            $url = url('storage/catalog/book/thumb/' . $book->image);
            } else {
            $url = url('storage/catalog/book/thumb/default.jpg');
            }
        @endphp
        <img src="{{ $url }}" class="card-img-top h-60 d-inline-block" alt="...">
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
        <div class="card-body p-2 pt-0">
        <p class="card-title mb-0">{{ $book->title}}</p>
        <p class="card-subtitle text-muted mb-0">Жанр: {{ $book->genre->title }}</p>
        <p class="card-subtitle text-muted">Автор: {{ $book->author->name }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('showbook', $book) }}" class="btn btn-success mb-2 col-md-9" role="button">Просмотр</a>

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
