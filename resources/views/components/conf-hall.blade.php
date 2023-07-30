<section class="conf-step">
    <header class="conf-step__header conf-step__header_opened">
        <h2 class="conf-step__title">Конфигурация залов</h2>
    </header>
    @if (count($halls) > 0)
        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">Выберите зал для конфигурации:</p>

            <ul class="conf-step__selectors-box">
                @foreach ($halls as $hall)
                    <li><input type="radio" class="conf-step__radio radioConfHall" name="chairs-hall" value={{ $hall->name }}
                            onclick="confHall({{ $hall }}); formConfHall({{ $hall->id }})"><span
                            class="conf-step__selector">{{ $hall->name }}</span></li>
                @endforeach
            </ul>
            <form method="post" class="formConfHall">
                @csrf
                @method('PATCH')
                <p class="conf-step__paragraph">Укажите количество рядов и максимальное количество кресел в ряду:</p>
                <div class="conf-step__legend">
                    <label class="conf-step__label">Рядов, шт<input type="text" class="conf-step__input row"
                            placeholder="10" name="row"></label>
                    <span class="multiplier">x</span>
                    <label class="conf-step__label">Мест, шт<input type="text" class="conf-step__input chair"
                            placeholder="8" name="chair"></label>
                    <input type="hidden" class="chairsAdd" name="chairs">
                </div>
                <p class="conf-step__paragraph">Теперь вы можете указать типы кресел на схеме зала:</p>
                <div class="conf-step__legend">
                    <span class="conf-step__chair conf-step__chair_standart"></span> — обычные кресла
                    <span class="conf-step__chair conf-step__chair_vip"></span> — VIP кресла
                    <span class="conf-step__chair conf-step__chair_disabled"></span> — заблокированные (нет кресла)
                    <p class="conf-step__hint">Чтобы изменить вид кресла, нажмите по нему левой кнопкой мыши</p>
                </div>
                <div class="conf-step__hall">
                </div>
                <fieldset class="conf-step__buttons text-center">
                    <button class="conf-step__button conf-step__button-regular" onclick="resetConfHall()"
                        type="button">Отмена</button>
                    <input type="button" value="Сохранить" class="conf-step__button conf-step__button-accent typeChangeConfHall">
                </fieldset>
            </form>
        </div>
    @else
        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">Создайте зал для его конфигурации</p>
        </div>
    @endif
    <script src="/jsAdmin/confHall.js"></script>
</section>
