<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class AnimeItem extends Model
{
    use Searchable;

    protected $table = 'anime_items'; 

    protected $fillable = [
        'id',
        'title',
        'title_english',
        'synopsis',
        'image',
        'year',
    ];

    public function searchableAs()
    {
        return 'anime_items';
    }

    public function toSearchableArray()
    {
        return $this->only([
            'id',
            'title',
            'title_english',
            'synopsis',
        ]);
    }
}
