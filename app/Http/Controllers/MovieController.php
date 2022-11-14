<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

  public function index()
  {
    //
  }

  public static function list() {
    return view('movies', [
      'movies' => Movie::orderBy('startYear', 'desc')->take(20)->get()
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
