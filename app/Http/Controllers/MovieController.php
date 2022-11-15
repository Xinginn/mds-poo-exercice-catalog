<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class MovieController extends Controller
{

  public function index()
  {
    //
  }

  public static function search(Request $request) {
    $titleQuery = $request->query('query');

    return view('search', [
      'movies' => Movie::where('primaryTitle', 'LIKE', '%'.$titleQuery.'%')->get(),
      'series' => Series::where('primaryTitle', 'LIKE', '%'.$titleQuery.'%')->get(),
      'query' => $titleQuery
    ]);
  }

  public static function list(Request $request) {
    $itemsPerPage = 20;
    $pageQuery = $request->query('page', 1);
    $criteriaQuery = $request->query('order_by', 'startYear');
    $orderQuery = $request->query('order', 'desc');
    $genreFilter = $request->query('genre', null);

    return view('movies', [
      'movies' => Movie::when($genreFilter != null, function($query) use($request) {
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

  public function create()
  {
    //
  }

  public static function show($id)
  {
    return view('movie', [
      'movie' => Movie::findOrFail($id)
    ]);
  }

  public static function showRandom()
  {
    return view('movie', [
      'movie' =>Movie::inRandomOrder()->first()
    ]);
  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
}
