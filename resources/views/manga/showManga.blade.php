<x-layout>
    <div class="container vh-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-12 col-md-6">
                <h2 class="display-4">
                    Titolo:
                    {{ is_string($manga['title_english'] ?? null)
                        ? $manga['title_english']
                        : (is_string($manga['title'] ?? null)
                            ? $manga['title']
                            : 'Titolo non disponibile') }}
                </h2>
                <p class="lead my-3">
                    {{ $manga['synopsis'] ?? 'Descrizione non disponibile.' }}
                </p>
                <h3>
                    Genere:
                    {{-- Bottone --}}
                    @foreach ($manga['genres'] as $genre)
                        <div class="voltage-button d-inline-block me-2 mb-2">
                            <a
                                href="{{ route('manga.index', ['genre_id' => $genre['mal_id'], 'genre_name' => $genre['name']]) }}">
                                <button type="button">{{ $genre['name'] }}</button>
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
                        {{-- Fine Bottone --}}
                    @endforeach
                </h3>
            </div>

            <div class="col-12 col-md-6 d-flex justify-content-center">
                <img src="{{ $manga['images']['jpg']['image_url'] }}"
                    alt="Poster di 
                    {{ is_string($manga['title_english'] ?? null)
                        ? $manga['title_english']
                        : (is_string($manga['title'] ?? null)
                            ? $manga['title']
                            : 'Titolo non disponibile') }}"
                    class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</x-layout>
