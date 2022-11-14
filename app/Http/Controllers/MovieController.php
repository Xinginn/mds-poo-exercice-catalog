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
    $pageQuery = $request->query('page');
    $criteriaQuery = $request->query('order_by');
    $orderQuery = $request->query('order');

    return view('movies', [
      'movies' => Movie::orderBy($criteriaQuery, $orderQuery)
        ->skip(($pageQuery -1) * $moviesPerPage )
        ->take($moviesPerPage)
        ->get(),
      'page' => $pageQuery,
      'criteria' => $criteriaQuery,
      'order' => $orderQuery
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
