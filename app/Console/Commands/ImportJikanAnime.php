<?php

namespace App\Console\Commands;

use App\Models\AnimeItem;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class ImportJikanAnime extends Command
{
    protected $signature   = 'jikan:import-anime {--pages=2}';
    protected $description = 'Importa anime da Jikan API in DB e li indicizza con Scout';

    public function handle()
    {
        $client = new Client(['base_uri' => 'https://api.jikan.moe/v4/']);

        $totalImported = 0;
        $pages = intval($this->option('pages'));

        for ($page = 1; $page <= $pages; $page++) {
            $response = $client->get("anime?page={$page}");
            $body     = json_decode($response->getBody(), true);

            foreach ($body['data'] as $anime) {
                $item = AnimeItem::updateOrCreate(
                    ['id' => $anime['mal_id']],
                    [
                        'title'         => $anime['title'],
                        'title_english' => $anime['title_english']     ?? null,
                        'synopsis'      => $anime['synopsis']           ?? '',
                        'image'         => $anime['images']['jpg']['image_url'] ?? '',
                        'year'          => intval(substr($anime['aired']['from'], 0, 4)),
                    ]
                );

                $item->searchable();
                $totalImported++;
            }

            $this->info("Pagina {$page} importata.");
        }

        $this->info("Import completato: {$totalImported} record indicizzati.");
    }
}
