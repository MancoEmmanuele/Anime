<?php
namespace App\Http\Controllers;

use App\Models\AnimeItem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function homepage()
    {
        return view('welcome');
    }

    public function mangaGenres()
    {
        $genres = Http::get('https://api.jikan.moe/v4/genres/manga')->json();
        // dd($genres);
        return view('manga.mangaGenres', ['genres' => $genres['data']]);
    }
    public function animeGenres()
    {
        $genres = Http::get('https://api.jikan.moe/v4/genres/anime')->json();

        return view('anime.animeGenres', ['genres' => $genres['data']]); //voglio che sia disponibile una variabile di nome genres che avrà al suo interno,
                                                                         //ma in posizione 'data'
    }

    public function indexAnime($genre_id, $genre_name)
    {
        $response = Http::get('https://api.jikan.moe/v4/anime', [
            'genres' => $genre_id,
        ])->json();

        $animes = Arr::map($response['data'], function ($anime) {
            return [
                'id'       => $anime['mal_id'],
                'image'    => $anime['images']['jpg']['large_image_url'],
                'title'    => $anime['title_english'],
                'year'     => $anime['year'],
                'synopsis' => $anime['synopsis'],
            ];
        });

        return view('anime.list', [
            'animes'     => $animes,
            'genre_name' => $genre_name,
            'genre_id'   => $genre_id,
        ]);
    }

    public function index($genre_id, $genre_name)
    {
        $response = Http::get('https://api.jikan.moe/v4/manga', [
            'genres' => $genre_id,
        ])->json();

        $mangas = Arr::map($response['data'], function ($manga) {
            return [
                'id'       => $manga['mal_id'],
                'image'    => $manga['images']['jpg']['large_image_url'],
                'title'    => $manga['title_english'],
                'synopsis' => $manga['synopsis'],
            ];
        });

        return view('manga.list', [
            'mangas'     => $mangas,
            'genre_name' => $genre_name,
            'genre_id'   => $genre_id,
        ]);
    }

    public function showAnime($anime_id)
    {
        $anime = Http::get('https://api.jikan.moe/v4/anime/' . $anime_id)->json();
        return view('anime.showAnime', ['anime' => $anime['data']]);
    }

    public function showManga($manga_id)
    {
        $manga = Http::get('https://api.jikan.moe/v4/manga/' . $manga_id)->json();
        return view('manga.showManga', ['manga' => $manga['data']]);
    }

    // RICERCA
  public function indexAnimeToSearch()
    {
        $response = Http::get('https://api.jikan.moe/v4/anime')->json();

        $animes = collect($response['data'])->map(function ($data) {
            return new AnimeItem([
                'id'             => $data['mal_id'],
                'title'          => $data['title'],
                'title_english'  => $data['title_english'] ?? $data['title'],
                'synopsis'       => $data['synopsis'],
                'image'          => $data['images']['jpg']['image_url'],
                'year'           => $data['year'],
            ]);
        });

        // Invia ciascun modello all’indice Scout
        $animes->each->searchable();

        return 'Anime indicizzati con successo!';
    }

    // Esegue la ricerca nell’indice MeiliSearch
    public function searchAnimeScout(Request $request)
    {
        $query = $request->input('q');
        $results = AnimeItem::search($query)->get();

        return view('anime.searchResults', ['animes' => $results]);
    }
}
