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
    return view('movies', [
      'movies' => Movie::orderBy('startYear', 'desc')
        ->skip(($pageQuery -1) * $moviesPerPage )
        ->take($moviesPerPage)
        ->get(),
      'page' => $pageQuery
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
