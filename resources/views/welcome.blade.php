<x-layout>
    <div class="hero-section">


        <div class="hero-text-block">
            <h1>Welcome to the gates</h1>
            <h2>Get the latest news on your favourite mangas, anime and manhwa around the world!</h2>

            <form class="subscription-form" action="{{ route('anime.search') }}" method="GET">
                <input type="input" name="q" placeholder="search..." />
                <div class="voltage-button">
                    <button type="submit">Search</button>

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

            </form>
        </div>

        <div class="genre-buttons">
            <x-button />
        </div>


        <div class="character-banner">
            <img src="{{ asset('image/sfondo2.jpeg') }}" alt="Anime character" />
        </div>

    </div>
</x-layout>
