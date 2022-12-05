<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TitleController;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
  return view('home', ['movie' => TitleController::getRandom('movie')]);
});

Route::get('/genres', [GenreController::class, 'list']);

Route::get('/movies', [MovieController::class, 'list']);


Route::get('/movies/random', [MovieController::class, 'showRandom']);
Route::get('/movies/{id}', [MovieController::class, 'show']);

Route::get('/series', [SeriesController::class, 'list']);
Route::get('/series/random', [SeriesController::class, 'showRandom']);
Route::get('/series/{id}', [SeriesController::class, 'show']);
Route::get('/series/{series_id}/season/{season_num}', [EpisodeController::class, 'listBySeason']);
Route::get('/series/{series_id}/season/{season_num}/episode/{id}', [EpisodeController::class, 'show']);

Route::get('/search', [MovieController::class, 'search']);
