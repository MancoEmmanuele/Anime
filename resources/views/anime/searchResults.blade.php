<x-layout>
    <div class="search-results">
        <h2>Risultati per "{{ request('q') }}"</h2>

        @if($animes->isEmpty())
            <p>Nessun risultato trovato.</p>
        @else
            <ul>
                @foreach($animes as $anime)
                    <li class="anime-card">
                        <img src="{{ $anime->image }}" alt="{{ $anime->title }}" width="100">
                        <div class="anime-info">
                            <strong>{{ $anime->title }}</strong>
                            @if($anime->year)
                                <span>({{ $anime->year }})</span>
                            @endif
                            <p>{{ $anime->synopsis }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layout>
