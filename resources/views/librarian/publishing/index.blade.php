@extends('librarian.layouts.app')

@section('title','Жанры книг')

@section('content')
<div class="col-md-12">
    <h2>Издательство</h2>
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
            <th>Издательство</th>
        </tr>
        @foreach ($publishings as $publishing)
        <tr>
            <td>{{ $publishing->id }}</td>
            <td>{{ $publishing->title }}</td>
            <td>
                <div class="btn-group" role="group">
                    <form action="{{route('librarian.publishing.destroy', $publishing)}}" method="POST">
                        <a class="btn btn-success" type="button" href="{{route('librarian.publishing.show', $publishing)}}">Открыть</a>
                        <a class="btn btn-warning" type="button" href="{{route('librarian.publishing.edit', $publishing)}}">Редактировать</a>
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
    {{ $publishings->links() }}
<a class="btn btn-success" type="button" href="{{route('librarian.publishing.create')}} ">Добавить издательство</a>
</div>
@endsection
