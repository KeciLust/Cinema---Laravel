@extends('layouts.client')
@section('content')
    <main>
        <section class="ticket">

            <header class="tichet__check">
                <h2 class="ticket__check-title">Вы выбрали билеты:</h2>
            </header>

            <div class="ticket__info-wrapper">
                <p class="ticket__info">На фильм: <span class="ticket__details ticket__title"> {{ $film->name }}</span></p>
                <p class="ticket__info">Места: <span class="ticket__details ticket__chairs">6, 7</span></p>
                <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{ $hall->name }}</span></p>
                <p class="ticket__info">Начало сеанса: <span
                        class="ticket__details ticket__start">{{ $bookings->time }}</span></p>
                <p class="ticket__info">Стоимость: <span class="ticket__details ticket__cost">600</span> рублей</p>

                <button class="acceptin-button" onclick="location.href='ticket.html'">Получить код бронирования</button>

                <p class="ticket__hint">После оплаты билет будет доступен в этом окне. Покажите
                    QR-код нашему контроллёру у входа в зал.</p>
                <p class="ticket__hint">Приятного просмотра!</p>
            </div>
        </section>
    </main>
    <script src="/jsClient/clientTimeRevers.js"></script>
@endsection
