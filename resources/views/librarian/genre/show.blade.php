@extends('librarian.layouts.app')

@section('title','Страница жанра')

@section('content')
    <div class="col-md-6">
        <table class="table table-bordered table-condensed">
            <caption>Страница жанра</caption>
            <tbody>
            <tr>
                <td>
                    Название жанра
                </td>
                <td>
                    {{$genre->title}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex flex-row mb-3 justify-content-center">
        <a href="{{ route('librarian.genre.index', $genre) }}" class="btn btn-primary mr-1">Назад</a>

        <form method="POST" action="{{ route('librarian.genre.destroy', $genre) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
