<!--Страница добавления книги-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/librarian">Библиотека</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Добавление книги</li>
                </ol>
              </nav>
            @if(Session::has('fail'))
              <div class="alert alert-danger">
                  {{Session::get('fail')}}
              </div>
             @endif
            <div class="card">
                <div class="card-header">{{ __('Добавление книги') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('librarian.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Автор') }}</label>
                            <div class="col-md-6">
                            <select name="author" id="author" class="form-control" >
                                <option value="0">Выберите автора</option>
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}} </option>
                                @endforeach
                            </select>
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Жанр') }}</label>

                            <div class="col-md-6">
                                <select name="genre" id="genre" class="form-control" >
                                    <option value="0">Выберите жанр</option>
                                    @foreach($genres as $genre)
                                        <option value="{{$genre->id}}">{{$genre->title}} </option>
                                    @endforeach
                                </select>

                                @error('genre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publishing" class="col-md-4 col-form-label text-md-right">{{ __('Издательство') }}</label>

                            <div class="col-md-6">
                                <select name="publishing" id="publishing" class="form-control" >
                                    <option value="0">Выберите издательство</option>
                                    @foreach($publishings as $publishing)
                                        <option value="{{$publishing->id}}">{{$publishing->title}} </option>
                                    @endforeach
                                </select>

                                @error('publishing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Сохранить') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

