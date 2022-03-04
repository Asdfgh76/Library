<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav col-12">
        <li class="nav-item col-8">
            <form method="GET" action="">
                <div class="filters row">
                    <div class="col-sm-1 col-md-1">
                        <label for="hit">
                            <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> hit
                        </label>
                    </div>
                    <div class="col-sm-1 col-md-1 pr-0 pl-0">
                        <label for="new">
                            <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> new
                        </label>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <label for="recommend">
                            <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> recommend
                        </label>
                    </div>
                    <div class="col-sm-5 col-md-5">
                        <button type="submit" class="btn btn-primary">Фильтр</button>
                    <a href="" class="btn btn-warning">Сброс</a>
                    </div>
                </div>
            </form>
        </li>
        <li class="nav-item col-4 d-flex flex-row-reverse">
            <form method="POST" class="form-inline" action="">
                @csrf
                <div class="form-group row">
                    <label for="search" class="col-md-5 col-form-label text-md-right pr-0">{{ __('Поиск по:') }}</label>
                    <div class="col-md-6 pl-0">
                        <select name="search" id="search" class="form-control" >
                            <option value="title">Названию</option>
                            <option value="author">Автору</option>
                            <option value="genre">Жанру</option>
                            <option value="publishing">Издательству</option>
                        </select>
                    </div>
                </div>
              <button class="btn btn-success ml-4" type="submit">Выбрать</button>
            </form>
        </li>
      </ul>
    </div>
  </nav>
