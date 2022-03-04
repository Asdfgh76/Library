<!--Страница добавления книги-->
@extends('librarian.layouts.app')

@section('content')
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('librarian.book.index')}}">Библиотека</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Редактирование книги</li>
                </ol>
              </nav>
            <div class="card">
                <div class="card-header">{{ __('Редактирование книги') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('librarian.book.update', $book) }}" enctype="multipart/form-data" id="contactForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group row align-items-center">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>
                            <div class="col-md-5">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')?? $book->title ?? '' }}" autocomplete="title" autofocus>
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
                                <textarea name="description" id="description" class="text-start form-control @error('description') is-invalid @enderror" rows="3" >{{ $book->description }}</textarea>
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
                                @if ($book->image)
                                <img src="{{ url('storage/catalog/book/thumb/' . $book->image) }}" alt="" class="col-md-8 p-3 rounded float-end img">
                                <button class="btn btn-success delimg">{{ __('Удалить изображение') }}</button>
                                <input  type="hidden"  name="empty" value="empty" >
                                @else
                                <input type="file" class="form-control" name="image" accept="image/png, image/jpeg">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-md-5 offset-md-4">
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

