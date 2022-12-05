<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;

class SeriesController extends TitleController
{

  public static function list(Request $request) {
    $request['titleType'] = 'series';
    $request['titleDBLabel'] = 'tvSeries';

    return TitleController::list($request);
  }

  public static function show($id)
  {
    return view('series-single', [
      'series' => TitleController::getSingle($id),
      'seasonsNumber' => Title::where('series_id', $id)
        ->distinct()
        ->count('seasonNumber')
    ]);
  }

  public static function showRandom()
  {
    return view('series-single', [
      'series' => TitleController::getRandom('Series')
    ]);
  }
}
