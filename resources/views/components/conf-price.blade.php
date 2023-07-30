<section class="conf-step">
    <header class="conf-step__header conf-step__header_opened">
        <h2 class="conf-step__title">Конфигурация цен</h2>
    </header>
    @if (count($halls) > 0)
        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">Выберите зал для конфигурации:</p>
            <ul class="conf-step__selectors-box">
                @foreach ($halls as $hall)
                    <li><input type="radio" class="conf-step__radio radioConfPrice" name="prices-hall"
                            value={{ $hall->name }}
                            onclick="setPrice({{ $hall }}); formConfPrice({{ $hall->id }})"><span
                            class="conf-step__selector">{{ $hall->name }}</span></li>
                @endforeach
            </ul>
            <form method="post" class="formConfPrice">
                @csrf
                @method('PATCH')
                <p class="conf-step__paragraph">Установите цены для типов кресел:</p>
                <div class="conf-step__legend">
                    <label class="conf-step__label">Цена, рублей<input type="text" class="conf-step__input price"
                            placeholder="100" name="price"></label>
                    за <span class="conf-step__chair conf-step__chair_standart"></span> обычные кресла
                </div>
                <div class="conf-step__legend">
                    <label class="conf-step__label">Цена, рублей<input type="text" class="conf-step__input priceVip"
                            placeholder="200" name="priceVip"></label>
                    за <span class="conf-step__chair conf-step__chair_vip"></span> VIP кресла
                </div>

                <fieldset class="conf-step__buttons text-center">
                    <button class="conf-step__button conf-step__button-regular" onclick="resetConfPrice()"
                        type="button">Отмена</button>
                    <input type="button" value="Сохранить"
                        class="conf-step__button conf-step__button-accent typeChangeConfPrice">
                </fieldset>
            </form>
        </div>
    @else
        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">Создайте зал для его конфигурации</p>
        </div>
    @endif
    <script src="jsAdmin/confPrice.js"></script>
</section>
