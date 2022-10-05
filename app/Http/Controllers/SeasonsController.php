<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    //command: php artisan make:controller SeasonsController
    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $seasons = $serie->seasons;

        return view('seasons.index', compact('serie', 'seasons'));
    }
}
