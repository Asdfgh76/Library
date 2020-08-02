<!--Страница добавления книги-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/librarian">Библиотека</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Добавление жанра</li>
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
                    <form method="POST" action="{{ route('genre.store') }}">
                        @csrf

                        <div class="form-group row align-items-center">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Название жанра') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
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

