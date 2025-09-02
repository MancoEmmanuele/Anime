<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user',function (Request $request){
    return $request->user();
});


Route::get('/manga/list/genres',function(){
    $genres = Http::get('https://api.jikan.moe/v4/genres/manga') -> json();
    return response($genres['data']);
});









