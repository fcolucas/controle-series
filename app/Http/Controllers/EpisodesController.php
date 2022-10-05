<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    //
    public function index(Season $season, Request $request)
    {
        $episodes = $season->episodes;
        $seasonId = $season->id;
        return view('episodes.index', [
            'episodes' => $episodes,
            'seasonId' => $seasonId,
            'message' => $request->session()->get('message')
        ]);
    }

    public function watchedEpisodes(Season $season, Request $request)
    {
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
           $episode->watched = in_array($episode->id, $watchedEpisodes);
        });

        $season->push();
        $request->session()->flash('message', 'Episodios marcados como assistidos');

        return redirect()->back();
    }
}
