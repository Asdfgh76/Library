@extends('librarian.layouts.app')

@section('title','Страница жанра')

@section('content')
    <div class="col-md-6">
        <table class="table table-bordered table-condensed">
            <caption>Страница издательства</caption>
            <tbody>
            <tr>
                <td>
                    Издательство
                </td>
                <td>
                    {{$publishing->title}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex flex-row mb-3 justify-content-center">
        <a href="{{ route('librarian.publishing.index', $publishing) }}" class="btn btn-primary mr-1">Назад</a>

        <form method="POST" action="{{ route('librarian.publishing.destroy', $publishing) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
