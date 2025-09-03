<x-layout>
    <div class="container">
        <div class="row">
            <h2 class="display-4 text-center my-5">
                Tutti gli anime del genere "{{ $genre_name }}"
            </h2>
            @foreach ($animes as $anime)
                <div class="col-12 col-md-3 mb-5">
                    <div class="card">
                        <img src="{{ $anime['image'] }}" class="card-img-top" alt="poster di {{ $anime['title'] }}"
                            style="height: 30rem;">
                        <div class="car-body">
                            <h5 class="card-title">
                                {{ $anime['title'] }}
                            </h5>
                            <p class="card-text text-truncate">
                                {{ $anime['synopsis'] }}
                            </p>
                            <p class="small fst-italic text-muted">
                                Anno: {{ $anime['year'] }}
                            </p>
                            {{-- bottone --}}
                            <div class="voltage-button">
                                <a href="{{ route('anime.show', ['anime_id' => $anime['id']]) }}">
                                    <button type="button">Vai al dettaglio</button>
                                </a>

                                <svg viewBox="0 0 180 60" xmlns="http://www.w3.org/2000/svg">
                                    <path class="line-1" d="M10,30 L170,30" stroke-width="2" fill="none" />
                                    <path class="line-2" d="M10,30 L170,30" stroke-width="2" fill="none" />
                                </svg>

                                <div class="dots">
                                    <div class="dot dot-1"></div>
                                    <div class="dot dot-2"></div>
                                    <div class="dot dot-3"></div>
                                    <div class="dot dot-4"></div>
                                    <div class="dot dot-5"></div>
                                </div>
                            </div>
                            

                            {{-- fine bottone --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-layout>
