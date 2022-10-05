<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\SerieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('name')->get();
        $message = $request->session()->get('message');

        return view('series.index', compact('series', 'message'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SerieService $serieService)
    {
        $serie = $serieService->createSerie($request->name, $request->qtd_temporadas, $request->ep_por_temporada);

        $request->session()
            ->flash(
                'message',
                "Série {$serie->id} e suas temporadas e episódios criadas com sucesso {$serie->name}"
            );

        return redirect()->route('series_index');
    }

    public function destroy(Request $request, SerieService $serieService)
    {
        $serieName = $serieService->removeSerie($request->id);

        $request->session()
            ->flash('message', "Série $serieName removida com sucesso");

        return redirect()->route('series_index');
    }

    public function changeName(int $id, Request $request)
    {
        $newName = $request->name;
        $serie = Serie::find($id);
        $serie->name = $newName;
        $serie->save();
    }
}
