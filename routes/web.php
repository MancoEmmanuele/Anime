<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'homepage');
    Route::get('/manga/genres', 'mangaGenres')->name('mangaGenres');
    Route::get('/anime/genres', 'animeGenres')->name('animeGenres');
    // vogliamo visualizzare il singolo elemento per il genere quindi creamo la nuova rotta

    Route::get('/manga/list/genre/{genre_id}/{genre_name}', 'index')->name('manga.index');
    Route::get('/anime/list/genre/{genre_id}/{genre_name}', 'indexAnime')->name('anime.index');
    //anime list per genere passando come parametro l'id e vogliamo anche il nome di quel genere <= uri dinamico

    //rotta per verificare il dettaglio delle singole card
    Route::get('/anime/detail/{anime_id}', 'showAnime')->name('anime.show');
    Route::get('/manga/detail/{manga}', 'showManga')->name('manga.show');

    //ricerca
   Route::get('/anime/search', [PublicController::class, 'searchAnimeScout'])
    ->name('anime.search');


});
