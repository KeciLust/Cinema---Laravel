<section class="conf-step">
    <header class="conf-step__header conf-step__header_opened">
        <h2 class="conf-step__title">Управление залами</h2>
    </header>
    <div class="conf-step__wrapper">
        <p class="conf-step__paragraph">Доступные залы:</p>
        @if (count($halls) > 0)
            <ul class="conf-step__list">
                @foreach ($halls as $hall)
                    <form action="{{ route('dellHall', ['hall' => $hall->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <li>{{ $hall->name }}
                            <button class="conf-step__button conf-step__button-trash" type="button"
                                onclick="document.querySelector('.dellHall{{ $hall->id }}').classList.add('active')"></button>
                            <div class="popup dellHall{{ $hall->id }}">
                                <div class="popup__container">
                                    <div class="popup__content">
                                        <div class="popup__header">
                                            <h2 class="popup__title">
                                                Удаление зала
                                                <button class="popup__dismiss" type="button"
                                                    onclick="document.querySelector('.dellHall{{ $hall->id }}').classList.remove('active')"><img
                                                        src="imgAdmin/close.png"></button>
                                            </h2>
                                        </div>
                                        <div class="popup__wrapper">
                                            <p class="conf-step__paragraph">Вы действительно хотите удалить зал:
                                                <span>{{ $hall->name }}</span>?
                                            </p>
                                            <div class="conf-step__buttons text-center">
                                                <input type="submit" value="Удалить"
                                                    class="conf-step__button conf-step__button-accent">
                                                <button type="button"
                                                    class="conf-step__button conf-step__button-regular"
                                                    onclick="document.querySelector('.dellHall{{ $hall->id }}').classList.remove('active')">Отменить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </form>
                @endforeach
            </ul>
        @endif
        <button class="conf-step__button conf-step__button-accent"
            onclick="document.querySelector('.addHall').classList.add('active')">Создать
            зал</button>
        <div class="popup addHall">
            <div class="popup__container">
                <div class="popup__content">
                    <div class="popup__header">
                        <h2 class="popup__title">
                            Добавление зала
                            <button class="popup__dismiss"><img src="imgAdmin/close.png" alt="Закрыть"
                                    onclick="document.querySelector('.addHall').classList.remove('active')"></button>
                        </h2>
                    </div>
                    <div class="popup__wrapper">
                        <form action="admin/addHall" method="post">
                            @csrf
                            <label class="conf-step__label conf-step__label-fullsize" for="name">
                                Название зала
                                <input class="conf-step__input" type="text"
                                    placeholder="Например, &laquo;Зал 1&raquo;" name="name" required>
                            </label>
                            <div class="conf-step__buttons text-center">
                                <input type="submit" value="Добавить зал"
                                    class="conf-step__button conf-step__button-accent">
                                <button class="conf-step__button conf-step__button-regular" type="button"
                                    onclick="document.querySelector('.conf-step__input').value = null">Отменить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
