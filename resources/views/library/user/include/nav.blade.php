<nav class="navbar navbar-expand-sm bg-light justify-content-center">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a href = "{{ route('user.booked') }}" class="btn btn-xs">
            <button type = "submit" class = "btn btn-info">Забронированные книги</button>
        </a>
        </li>
        <li class="nav-item">
        <a href = "{{ route('user.bookshand') }}" class="btn btn-xs">
            <button type = "submit" class = "btn btn-info">Книги на руках</button>
        </a>
        </li>
    </ul>
    <form method="POST" class="form-inline" action="{{ route('user.search') }}">
        @csrf
        <div class="form-group row">
            <label for="search" class="col-md-5 col-form-label text-md-right pr-0">{{ __('Поиск по:') }}</label>
            <div class="col-md-6 pl-0">
                <select name="search" id="search" class="form-control" >
                    <option value="title">Названию</option>
                    <option value="author">Автору</option>
                    <option value="genre">Жанру</option>
                    <option value="pub">Издательству</option>
                </select>
            </div>
        </div>
      <button class="btn btn-success ml-4" type="submit">Выбрать</button>
    </form>
  </nav>
