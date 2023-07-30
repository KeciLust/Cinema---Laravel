<section class="conf-step">
    <header class="conf-step__header conf-step__header_opened">
        <h2 class="conf-step__title">Открыть продажи</h2>
    </header>
    <div class="conf-step__wrapper text-center">
        <p class="conf-step__paragraph">Всё готово, теперь можно:</p>
        @if (count($halls) > 0)
            <form action="logout" method="get">
                <button class="conf-step__button conf-step__button-accent validButton" type="button"
                    onclick="valid({{$halls}})">Открыть продажу билетов</button>
            </form>
        @endif
    </div>
    <script src="jsAdmin/confsession.js"></script>
</section>
