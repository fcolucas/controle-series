<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\{SeriesController, SeasonsController, EpisodesController, RegisterController, LoginController, HomeController};

Route::get('/ola', function () {
    echo "Olá mundo!";
});

Route::get('/series', [SeriesController::class, 'index'])->name('series_index');
Route::get('/series/criar', [SeriesController::class, 'create'])
    ->name('form_serie_create')->middleware('series');
Route::post('/series/criar', [SeriesController::class, 'store'])->middleware('series');
Route::delete('/series/{id}', [SeriesController::class, 'destroy'])->middleware('series');
Route::post('/series/{id}/changeName', [SeriesController::class, 'changeName'])->middleware('series');

Route::get('/series/{serieId}/temporadas', [SeasonsController::class, 'index']);

Route::get('/temporadas/{season}/episodios', [EpisodesController::class, 'index']);
Route::post('/temporada/{season}/episodios/assistir', [EpisodesController::class, 'watchedEpisodes'])->middleware('series');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/entrar', [LoginController::class, 'index']);
Route::post('/entrar', [LoginController::class, 'login']);
Route::get('/sair', [LoginController::class, 'logout']);

Route::get('/registrar', [RegisterController::class, 'create']);
Route::post('/registrar', [RegisterController::class, 'store']);
