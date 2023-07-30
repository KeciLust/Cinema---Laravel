<main>
    @if (count($films) > 0)
        @foreach ($films as $film)
            <section class="movie">
                <div class="movie__info">
                    <div class="movie__poster">
                        <img class="movie__poster-image" alt="Звёздные войны постер" src="imgClient/poster1.jpg">
                    </div>
                    <div class="movie__description">
                        <h2 class="movie__title">{{ $film->name }}</h2>
                        <p class="movie__synopsis">{{ $film->description }}</p>
                        <p class="movie__data">
                            <span class="movie__data-duration">{{ $film->lenght }} минут.</span>
                            <span class="movie__data-origin">{{ $film->country }}</span>
                        </p>
                    </div>
                </div>
                @foreach ($halls as $hall)
                    @if ($hall->films->find($film))
                        <div class="movie-seances__hall">
                            <h3 class="movie-seances__hall-title">{{ $hall->name }}</h3>
                            <ul class="movie-seances__list">
                                @foreach ($hall->films as $f)
                                    @if ($f->id === $film->id)
                                        <li class="movie-seances__time-block"><a class="movie-seances__time"
                                                href="javascript: time({{ $hall->id }}, {{ $f->id }}, '{{ $f->time->time }}')">{{ $f->time->time }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endforeach
            </section>
        @endforeach
    @endif



</main>
