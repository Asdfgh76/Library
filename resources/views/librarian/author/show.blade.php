@extends('librarian.layouts.app')

@section('title','Страница автора')

@section('content')
    <div class="col-md-6">
        <table class="table table-bordered table-condensed">
            <caption>Страница автора</caption>
            <tbody>
            <tr>
                <td>
                    Ф.И.О автора
                </td>
                <td>
                    {{$author->name}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex flex-row mb-3 justify-content-center">
        <a href="{{ route('librarian.author.index', $author) }}" class="btn btn-primary mr-1">Назад</a>

        <form method="POST" action="{{ route('librarian.author.destroy', $author) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
