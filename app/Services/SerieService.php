<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\{Serie, Season, Episode};

class SerieService
{
    public function createSerie(string $nameSerie, int $numSeasons, int $epForSeason): Serie
    {
        $serie = null;
        DB::beginTransaction();
        $serie = Serie::create([
            'name' => $nameSerie
        ]);
        $this->saveSeasons($numSeasons, $serie, $epForSeason);
        DB::commit();
        return $serie;
    }

    public function removeSerie(int $serieId): string
    {
        $nameSerie = '';
        DB::transaction(function () use ($serieId, &$nameSerie) {
            $serie = Serie::find($serieId);
            $nameSerie = $serie->name;

            $this->removeSeasons($serie);
            $serie->delete();
        });
        return $nameSerie;
    }

    /**
     * @param $serie
     * @return void
     * @throws \Exception
     */
    private function removeSeasons($serie): void
    {
        $serie->seasons->each(function (Season $season) {
            $this->removeEpisodes($season);
            $season->delete();
        });
    }

    /**
     * @param Season $season
     * @return void
     * @throws \Exception
     */
    private function removeEpisodes(Season $season): void
    {
        $season->episodes->each(function (Episode $episode) {
            $episode->delete();
        });
    }

    /**
     * @param int $epForSeason
     * @param $season
     * @return void
     */
    private function saveEpisodes(int $epForSeason, Season $season): void
    {
        for ($j = 1; $j <= $epForSeason; $j++) {
            $season->episodes()->create(['number' => $j]);
        }
    }

    /**
     * @param int $numSeasons
     * @param Serie $serie
     * @param int $epForSeason
     * @return void
     */
    private function saveSeasons(int $numSeasons, Serie $serie, int $epForSeason): void
    {
        for ($i = 1; $i <= $numSeasons; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);

            $this->saveEpisodes($epForSeason, $season);
        }
    }
}
