@extends('admin.layouts.app')

@section('title','Профиль клиента')

@section('content')
    <div class="col-md-6">
        <table class="table table-bordered table-condensed">
            <caption>Профиль клиента</caption>
            <tbody>
            <tr>
                <td>
                    id
                </td>
                <td>
                    {{$user->id}}
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    {{$user->email}}
                </td>
            </tr>
            <tr>
                <td>
                    Дата регистрации
                </td>
                <td>
                    {{ $user->created_at->format('d.m.Y H:i') }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex flex-row mb-3 justify-content-center">
        <a href="{{ route('admin.user.index', $user) }}" class="btn btn-primary mr-1">Назад</a>

        <form method="POST" action="{{ route('admin.user.destroy', $user) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
