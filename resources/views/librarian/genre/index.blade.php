@extends('librarian.layouts.app')

@section('title','Жанры книг')

@section('content')
<div class="col-md-12">
    <h2>Жанры книг</h2>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    <table class="table table-hover">
        <tbody>
        <tr>
            <th>#</th>
            <th>Название жанра</th>
        </tr>
        @foreach ($genres as $genre)
        <tr>
            <td>{{ $genre->id }}</td>
            <td>{{$genre->title}}</td>
            <td>
                <div class="btn-group" role="group">
                    <form action="{{route('librarian.genre.destroy', $genre)}}" method="POST">
                        <a class="btn btn-success" type="button" href="{{route('librarian.genre.show', $genre)}}">Открыть</a>
                        <a class="btn btn-warning" type="button" href="{{route('librarian.genre.edit', $genre)}}">Редактировать</a>
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Удалить">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $genres->links() }}
<a class="btn btn-success" type="button" href="{{route('librarian.genre.create')}} ">Добавить жанр</a>
</div>
@endsection
