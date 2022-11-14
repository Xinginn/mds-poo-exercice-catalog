<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class MovieController extends Controller
{

  public function index()
  {
    //
  }

  public static function list(Request $request) {
    $moviesPerPage = 20;
    $pageQuery = ($request->has('page')) ? $request->query('page') : 1;
    $criteriaQuery = ($request->has('order_by')) ? $request->query('order_by') : 'startYear';
    $orderQuery = ($request->has('order')) ? $request->query('order') : 'desc';

    $genreFilter = ($request->has('genre')) ? $request->query('genre') : null;


    return view('movies', [
      'movies' => Movie::when($genreFilter != null, function($query) use($request) {
          return $query->whereHas('genres', function($query) use($request){
            return $query->where('id', $request->genre);
          });
        })
        ->orderBy($criteriaQuery, $orderQuery)
        ->skip(($pageQuery -1) * $moviesPerPage )
        ->take($moviesPerPage)
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
