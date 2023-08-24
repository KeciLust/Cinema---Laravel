@extends('layouts.client')
@section('content')
    <main>
        <section class="ticket">

            <header class="tichet__check">
                <h2 class="ticket__check-title">Вы выбрали билеты:</h2>
            </header>

            <div class="ticket__info-wrapper">
                <p class="ticket__info">На фильм: <span class="ticket__details ticket__title"> {{ $film->name }}</span></p>
                <p class="ticket__info">Билеты на: <span class="ticket__details ticket__chairs"></span></p>
                <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{ $hall->name }}</span></p>
                <p class="ticket__info">Начало сеанса: <span
                        class="ticket__details ticket__start">{{ $bookings->time }}</span></p>
                <p class="ticket__info">Стоимость: <span class="ticket__details ticket__cost">{{ $price }}</span>
                    рублей</p>
                <button class="acceptin-button" type="button">Получить код
                    бронирования</button>
                <p class="ticket__hint">После оплаты билет будет доступен в этом окне. Покажите
                    QR-код нашему контроллёру у входа в зал.</p>
                <p class="ticket__hint">Приятного просмотра!</p>
            </div>
        </section>
        <section class="ticketF">

            <header class="tichet__check">
                <h2 class="ticket__check-title">Электронный билет</h2>
            </header>

            <div class="ticket__info-wrapper">
                <p class="ticket__info">На фильм: <span class="ticket__details ticket__title"> {{ $film->name }}</span>
                </p>
                <p class="ticket__info">Билеты на: <span class="ticket__details ticket__chairs ticketF__chairs"></span></p>
                <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{ $hall->name }}</span></p>
                <p class="ticket__info">Начало сеанса: <span
                        class="ticket__details ticket__start">{{ $bookings->time }}</span></p>
                <img class="ticket__info-qr"
                    src='http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl={{ $hall->name }} {{ $film->name }} {{ $bookings->date }} {{ $bookings->time }} '>

                <p class="ticket__hint">Покажите QR-код нашему контроллеру для подтверждения бронирования.</p>
                <p class="ticket__hint">Приятного просмотра!</p>
            </div>
        </section>
    </main>
    <script src="/jsClient/clientPay.js"></script>
    <script>
        clientPay({{ $chairPay }}, {{ $hall->row }}, {{ $hall->chair }}, {{ $hall->chairs }})
    </script>
    <script src="/jsClient/clientTimeRevers.js"></script>
@endsection
