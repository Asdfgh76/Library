<!--Главная страница Админа-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
                </ol>
            </nav>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            <nav class="navbar navbar-expand-sm bg-light justify-content-between">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href = "{{ route('admin.users.create')}}" class="btn btn-xs">
                            <button type = "submit" class = "btn btn-success">Добавить</button>
                        </a>
                    </li>
                </ul>
            </nav>
		    <div class="card">
                <div class="card-header">{{ __('Пользователи') }}</div>
			    <div class="card-body">
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                            <tr>

                                <th>Логин</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                                <tr>

                                    <td>{{ $user->login }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a class="btn btn-xs">
                                            <form method = "POST" action = "{{ route('admin.users.destroy', $user->id)}}" style="float: none">
                                                @method('DELETE')
                                                @csrf
                                                <button type = "submit" class = "btn btn-danger">Удалить</button>
                                            </form>
                                        </a>
                                        <a href = "{{ route('admin.users.edit', $user->id)}}">
                                            <button type = "button" class = "btn btn-info">Изменить</button>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
		    </div>
	    </div>
    </div>
    @if($users->total() > $users->count())
<br>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endif
</div>
<?php //dd($errors); ?>
@endsection
