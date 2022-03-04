@extends('admin.layouts.app')

@section('title','Клиенты')

@section('content')
<div class="col-md-12">
    <h2>Клиенты</h2>
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
            <th width="25%">Дата регистрации</th>
            <th>Имя</th>
            <th>Email</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
            <td>{{$user->name}}</td>
            <td><a href="{{ $user->email }}">{{ $user->email }}</a></td>
            <td>
                <div class="btn-group" role="group">
                    <form action="{{route('admin.user.destroy', $user)}}" method="POST">
                        <a class="btn btn-success" type="button" href="{{route('admin.user.show', $user)}}">Открыть</a>
                        <a class="btn btn-warning" type="button" href="{{route('admin.user.edit', $user)}}">Редактировать</a>
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
    {{ $users->links() }}
<a class="btn btn-success" type="button" href="{{route('admin.user.create')}} ">Добавить клиента</a>
</div>
@endsection
