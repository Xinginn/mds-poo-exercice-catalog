<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

  public static function list(Request $request) {
    $itemsPerPage = 20;
    $pageQuery = $request->query('page', 1);
    $criteriaQuery = $request->query('order_by','startYear');
    $orderQuery = $request->query('order', 'desc');
    $genreFilter = $request->query('genre', null);

    return view('series', [
      'series' => Series::when($genreFilter != null, function($query) use($request) {
          return $query->whereHas('genres', function($query) use($request){
            return $query->where('id', $request->genre);
          });
        })
        ->orderBy($criteriaQuery, $orderQuery)
        ->skip(($pageQuery -1) * $itemsPerPage )
        ->take($itemsPerPage)
        ->get(),
      'page' => $pageQuery,
      'criteria' => $criteriaQuery,
      'order' => $orderQuery,
      'genre' => $genreFilter
    ]);
  }

  public static function show($id)
  {
    return view('series-single', [
      'series' => Series::findOrFail($id)
    ]);
  }

  public static function showRandom()
  {
    return view('series-single', [
      'series' =>Series::inRandomOrder()->first()
    ]);
  }
}
