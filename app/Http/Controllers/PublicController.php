<?php
namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class PublicController extends Controller
{
    public function homepage()
    {
        return view('welcome');
    }

    public function mangaGenres()
    {
        $genres = Http::get('https://api.jikan.moe/v4/genres/manga')->json();
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
            'title'    => $anime['title_english'] ?? $anime['title'],
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
            'mangas'      => $mangas,
            'genre_name' => $genre_name,
            'genre_id'   => $genre_id,
        ]);
    }

}
