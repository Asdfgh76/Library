@extends('librarian.layouts.app')

@section('title','Авторы книг')

@section('content')
<div class="col-md-12">
    <h2>Авторы книг</h2>
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
            <th>Ф.И.О автора</th>
        </tr>
        @foreach ($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{$author->name}}</td>
            <td>
                <div class="btn-group" role="group">
                    <form action="{{route('librarian.author.destroy', $author)}}" method="POST">
                        <a class="btn btn-success" type="button" href="{{route('librarian.author.show', $author)}}">Открыть</a>
                        <a class="btn btn-warning" type="button" href="{{route('librarian.author.edit', $author)}}">Редактировать</a>
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
    {{ $authors->links() }}
<a class="btn btn-success" type="button" href="{{route('librarian.author.create')}} ">Добавить автора</a>
</div>
@endsection
