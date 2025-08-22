<x-layout>
    <div class="container">
        <div class="row">
            <h2 class="display-4 text-center mb-2">Tutti i generi di Anime disponibili</h2>
            @foreach ($genres as $genre)
                <div class="col-12 col-md-4 mb-3">
                    <div class="card" style="width:18rem">
                        <div class="card-body">
                            <h5 class="card-title">{{ $genre['name'] }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Anime disponibili: {{ $genre['count'] }}
                            </h6>
                            <a
                                href="{{ route('anime.index', ['genre_id' => $genre['mal_id'], 'genre_name' => $genre['name']]) }}">
                                Leggi di più
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
