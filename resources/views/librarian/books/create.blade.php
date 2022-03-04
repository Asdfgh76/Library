<!--Страница добавления книги-->
@extends('librarian.layouts.app')

@section('content')
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('librarian.book.index')}}">Библиотека</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Добавление книги</li>
                </ol>
              </nav>
            <div class="card">
                <div class="card-header">{{ __('Добавление книги') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('librarian.book.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row align-items-center">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Автор') }}</label>
                            <div class="col-md-5">
                            <select name="author_id" id="author" class="form-control @error('author_id') is-invalid @enderror" >
                                <option value="">Выберите автора</option>
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}} </option>
                                @endforeach
                            </select>
                                @error('author_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href = "{{ route('librarian.author.create') }}" class="btn btn-primary col-md-3" role="button">
                            Добавить автора
                            </a>
                        </div>

                        <div class="form-group row align-items-center">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Жанр') }}</label>

                            <div class="col-md-5">
                                <select name="genre_id" id="genre" class="form-control @error('genre_id') is-invalid @enderror" >
                                    <option value="">Выберите жанр</option>
                                    @foreach($genres as $genre)
                                        <option value="{{$genre->id}}">{{$genre->title}} </option>
                                    @endforeach
                                </select>

                                @error('genre_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href = "{{ route('librarian.genre.create') }}" class="btn btn-primary col-md-3" role="button">
                                Добавить жанр
                            </a>
                        </div>

                        <div class="form-group row align-items-center">
                            <label for="publishing" class="col-md-4 col-form-label text-md-right">{{ __('Издательство') }}</label>

                            <div class="col-md-5">
                                <select name="publishing_id" id="publishing" class="form-control @error('publishing_id') is-invalid @enderror" >
                                    <option value="">Выберите издательство</option>
                                    @foreach($publishings as $publishing)
                                        <option value="{{$publishing->id}}">{{$publishing->title}} </option>
                                    @endforeach
                                </select>

                                @error('publishing_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href = "{{ route('librarian.publishing.create') }}" class="btn btn-primary col-md-3" role="button">
                                Добавить издателя
                            </a>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>

                            <div class="col-md-5">
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" >

                                </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Изображение') }}</label>
                            <div class="col-md-5">
                            <input type="file" class="form-control" name="image" accept="image/png, image/jpeg">
                            </div>
                        </div>
                        @isset($book->image)
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="remove" id="remove">
                                <label class="form-check-label" for="remove">
                                    Удалить загруженное изображение
                                </label>
                            </div>
                        @endisset
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
@endsection

