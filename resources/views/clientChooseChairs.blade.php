@extends('layouts.client')
@section('content')
    <main>
        <script src="/jsClient/clientAddChairs.js"></script>
        <section class="buying">
            <div class="buying__info">
                <div class="buying__info-description">
                    <h2 class="buying__info-title">{{ $film->name }}</h2>

                    <p class="buying__info-start">{{ $bookings->time }}</p>
                    <p class="buying__info-hall">{{ $hall->name }}</p>
                </div>
            </div>
            <form method="POST" action="/client/clientPay">
                @csrf
                @method('PATCH')
                <input type="hidden" class="clientAddChairs" name="clientAddChairs">
                <input type="hidden" name="film" value="{{ $film->id }}">
                <input type="hidden" name="hall" value="{{ $hall->id }}">
                <input type="hidden" name="bookings" value="{{ $bookings->id }}">
                <input type="hidden" name="price" class="price">
                <input type="hidden" name="chairPay" class="chairPay">
                <div class="buying-scheme">
                    <div class="buying-scheme__wrapper">
                        <script>
                            addChairs({{ $hall->row }}, {{ $hall->chair }}, {{ $bookings->chairs }}, {{$hall->price}}, {{$hall->priceVip}})
                        </script>
                    </div>
                    <div class="buying-scheme__legend">
                        <div class="col">
                            <p class="buying-scheme__legend-price"><span
                                    class="buying-scheme__chair buying-scheme__chair_standart"></span> Свободно (<span
                                    class="buying-scheme__legend-value">{{ $hall->price }}</span>руб)</p>
                            <p class="buying-scheme__legend-price"><span
                                    class="buying-scheme__chair buying-scheme__chair_vip"></span> Свободно VIP (<span
                                    class="buying-scheme__legend-value">{{ $hall->priceVip }}</span>руб)</p>
                        </div>
                        <div class="col">
                            <p class="buying-scheme__legend-price"><span
                                    class="buying-scheme__chair buying-scheme__chair_taken"></span> Занято</p>
                            <p class="buying-scheme__legend-price"><span
                                    class="buying-scheme__chair buying-scheme__chair_selected"></span> Выбрано</p>
                        </div>
                    </div>
                </div>
                <button class="acceptin-button" type="button">Забронировать</button>
            </form>
        </section>
    </main>
    <script src="/jsClient/clientTimeRevers.js"></script>
@endsection
