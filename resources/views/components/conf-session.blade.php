<section class="conf-step">
    <header class="conf-step__header conf-step__header_opened">
        <h2 class="conf-step__title">Сетка сеансов</h2>
    </header>
    <div class="conf-step__wrapper">
        <div class="popup addFilm">
            <div class="popup__container">
                <div class="popup__content">
                    <div class="popup__header">
                        <h2 class="popup__title">
                            Добавление фильма
                            <button class="popup__dismiss"
                                onclick="document.querySelector('.addFilm').classList.remove('active')"><img
                                    src="imgAdmin/close.png" alt="Закрыть"></button>
                        </h2>
                    </div>
                    <div class="popup__wrapper">
                        <form action="admin/addFilm" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="conf-step__label conf-step__label-fullsize " for="name">
                                Название фильма
                                <input class="conf-step__input nameAddFilm" type="text"
                                    placeholder="Например, &laquo;Гражданин Кейн&raquo;" name="name" required>
                            </label>
                            <label class="conf-step__label conf-step__label-fullsize" for="country">
                                Страна производства фильма
                                <input class="conf-step__input countryAddFilm" type="text"
                                    placeholder="Например, &laquo;Россия&raquo;" name="country" required>
                            </label>
                            <label class="conf-step__label conf-step__label-fullsize" for="lenght">
                                Длительность фильма в минутах фильма
                                <input class="conf-step__input lenghtAddFilm" type="number" min="30"
                                    max="300" step="5" placeholder="Например, &laquo;130&raquo;"
                                    name="lenght" required>
                            </label>
                            <label class="conf-step__label conf-step__label-fullsize" for="description">
                                Анотация фильма
                                <input class="conf-step__input descriptionAddFilm" type="text"
                                    placeholder="Например, &laquo;Жил да был...&raquo;" name="description" required>
                            </label>
                            <div class="conf-step__buttons text-center">
                                <input type="submit" value="Добавить фильм"
                                    class="conf-step__button conf-step__button-accent">
                                <button class="conf-step__button conf-step__button-regular" type="button"
                                    onclick="resetAddFilm()">Отменить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p class="conf-step__paragraph">
            <button class="conf-step__button conf-step__button-accent"
                onclick="document.querySelector('.addFilm').classList.add('active')">Добавить фильм</button>
        </p>
        <div class="conf-step__movies">
            @if (count($films) > 0)
                @foreach ($films as $film)
                    <form action="{{ route('dellFilm', ['film' => $film->id]) }}" method="post"
                        class="conf-step__movie color{{ $film->id }} ">
                        @csrf
                        @method('delete')
                        <div onclick="document.querySelector('.dellFilm{{ $film->id }}').classList.add('active')">
                            <img class="conf-step__movie-poster" alt="poster" src="imgAdmin/poster.png">
                            <h3 class="conf-step__movie-title">{{ $film->name }}</h3>
                            <p class="conf-step__movie-duration">{{ $film->lenght }}</p>
                        </div>
                        <div class="popup dellFilm{{ $film->id }}">
                            <div class="popup__container">
                                <div class="popup__content">
                                    <div class="popup__header">
                                        <h2 class="popup__title">
                                            Удаление фильма
                                            <button class="popup__dismiss" type="button"
                                                onclick="document.querySelector('.dellFilm{{ $film->id }}').classList.remove('active')"><img
                                                    src="imgAdmin/close.png" alt="Закрыть"></button>
                                        </h2>
                                    </div>
                                    <div class="popup__wrapper">
                                        <form action="delete_hall" method="post" accept-charset="utf-8">
                                            <p class="conf-step__paragraph">Вы действительно хотите удалить фильм:
                                                <span>{{ $film->name }}</span>?
                                            </p>
                                            <div class="conf-step__buttons text-center">
                                                <input type="submit" value="Удалить"
                                                    class="conf-step__button conf-step__button-accent">
                                                <button type="button"
                                                    onclick="document.querySelector('.dellFilm{{ $film->id }}').classList.remove('active')"
                                                    class="conf-step__button conf-step__button-regular">Отменить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            @endif
        </div>
        <div class="conf-step__seances">
            @if (count($halls) > 0)
                @foreach ($halls as $hall)
                    <div class="conf-step__seances-hall">
                        <h3 class="conf-step__seances-title">{{ $hall->name }}</h3> <button
                            class="conf-step__button conf-step__button-trash conf-step__button-dellFilmSession"
                            type="button"
                            onclick="document.querySelector('.dellFilmSession{{ $hall->id }}').classList.add('active')"></button>
                        <div class="popup dellFilmSession{{ $hall->id }}">
                            <div class="popup__container">
                                <div class="popup__content">
                                    <div class="popup__header">
                                        <h2 class="popup__title">
                                            Удаление фильма с сеанса
                                            <button class="popup__dismiss" type="button"
                                                onclick="document.querySelector('.dellFilmSession{{ $hall->id }}').classList.remove('active')"><img
                                                    src="imgAdmin/close.png"></button>
                                        </h2>
                                    </div>
                                    <div class="popup__wrapper">
                                        <p class="conf-step__paragraph">
                                            Выберите фильм для снятия с сеанса
                                        </p>
                                        <form action="admin/{{ $hall->id }}/dellFilmSession" method="post">
                                            @csrf
                                            @method('delete')
                                            <label class="conf-step__label conf-step__label-fullsize ">
                                                Выберите фильм
                                                <select class="conf-step__input" name="filmTime">
                                                    @foreach ($hall->films as $film)
                                                        <option value="{{ $film->time->time }}">Фильм:
                                                            {{ $film->name }}.
                                                            начало в: {{ $film->time->time }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </label>
                                            <div class="conf-step__buttons text-center">
                                                <input type="submit" value="Удалить"
                                                    class="conf-step__button conf-step__button-accent">
                                                <button type="button"
                                                    class="conf-step__button conf-step__button-regular"
                                                    onclick="document.querySelector('.dellFilmSession{{ $hall->id }}').classList.remove('active')">Отменить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="conf-step__seances-timeline"
                            onclick="document.querySelector('.addSession{{ $hall->id }}').classList.add('active')">
                            @foreach ($hall->films as $film)
                                <div class="conf-step__seances-movie"
                                    style="width: 60px; background-color: rgb(133, 255, 137);
                                     width:{{ $film->lenght / 12.5 }}%;
                                     left: calc({{ (strtotime($film->time->time) - strtotime('00:00') - 28800) / 756 }}%)">
                                    <p class="conf-step__seances-movie-title">{{ $film->name }}</p>
                                    <p class="conf-step__seances-movie-start">{{ $film->time->time }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="popup addSession{{ $hall->id }}">
                        <div class="popup__container">
                            <div class="popup__content">
                                <div class="popup__header">
                                    <h2 class="popup__title">
                                        Добавление фильма в сеанс зала: {{ $hall->name }}
                                        <button class="popup__dismiss" type="button"
                                            onclick="document.querySelector('.addSession{{ $hall->id }}').classList.remove('active')"><img
                                                src="imgAdmin/close.png" alt="Закрыть"></button>
                                    </h2>
                                </div>
                                <div class="popup__wrapper">
                                    <form action="admin/{{ $hall->id }}/addSession" method="post">
                                        @csrf
                                        <label class="conf-step__label conf-step__label-fullsize">
                                            Выберите фильм
                                            <select class="conf-step__input filmLenghtAddSession" name="film">
                                                @foreach ($films as $film)
                                                    <option value="{{ $film->id }}">{{ $film->name }}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                        <label class="conf-step__label conf-step__label-fullsize">
                                            Время начала фильма
                                            <input class="conf-step__input timeSession" type="time" min="08:00"
                                                max="23:59" name="timeSession" required>
                                        </label>

                                        <div class="conf-step__buttons text-center">
                                            <input type="button" onclick="addSession({{ $hall->films }}, {{$hall->id}})"
                                                value="Добавить фильм в сеанс"
                                                class="conf-step__button conf-step__button-accent inputAddSession">
                                            <button class="conf-step__button conf-step__button-regular" type="button"
                                                onclick="resetAddSession()">Отменить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        {{-- <fieldset class="conf-step__buttons text-center">
            <button class="conf-step__button conf-step__button-regular">Отмена</button>
            <input type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent">
        </fieldset> --}}
    </div>
    <script src="jsAdmin/confsession.js"></script>
</section>
