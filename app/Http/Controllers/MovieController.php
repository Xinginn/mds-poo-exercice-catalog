<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class MovieController extends TitleController
{

  public static function search(Request $request) {
    $titleQuery = $request->query('query');

    return view('search', [
      'movies' => Movie::where('primaryTitle', 'LIKE', '%'.$titleQuery.'%')->get(),
      'series' => Series::where('primaryTitle', 'LIKE', '%'.$titleQuery.'%')->get(),
      'query' => $titleQuery
    ]);
  }

  public static function list(Request $request) {
    $request['titleType'] = 'movies';
    $request['titleDBLabel'] = 'movie';
    
    return TitleController::list($request);

  }

  public static function show($id)
  {
    return view('movie', [
      'movie' => TitleController::getSingle($id)
    ]);
  }

  public static function showRandom()
  {
    return view('movie', [
      'movies' => TitleController::getRandom('movie')
    ]);
  }
}
