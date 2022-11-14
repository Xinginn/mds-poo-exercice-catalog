<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
  public static function list(){
    return view('genres', [
      'genres' => Genre::all()
    ]);
  }
}
