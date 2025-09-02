<x-layout>
    <div class="container vh-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-12 col-md-6">
                <h2 class="display-4">
                    Titolo: 
                    {{ is_string($anime['title_english'] ?? null) 
                        ? $anime['title_english'] 
                        : (is_string($anime['title'] ?? null) ? $anime['title'] : 'Titolo non disponibile') }}
                </h2>

                <h3>
                    Genere: 
                    @foreach ($anime['genres'] as $genre)
                        <a href="{{ route('anime.index', ['genre_id' => $genre['mal_id'], 'genre_name' => $genre['name']]) }}" class="badge bg-primary text-decoration-none me-1">
                            {{ $genre['name'] }}
                        </a>
                    @endforeach
                </h3>
            </div>

            <div class="col-12 col-md-6 d-flex justify-content-center">
                <img src="{{ $anime['images']['jpg']['image_url'] }}" alt="Poster di 
                    {{ is_string($anime['title_english'] ?? null) 
                        ? $anime['title_english'] 
                        : (is_string($anime['title'] ?? null) ? $anime['title'] : 'Titolo non disponibile') }}" 
                    class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</x-layout>
