<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{

  public static function listBySeason($series_id, $season_num) {
    return view('episodes', [
      'episodes' => Episode::where('series_id', $series_id)
        ->where('seasonNumber', $season_num)
        ->orderBy('episodeNumber', 'asc')
        ->get(),
      'series' => $series_id,
      'season' => $season_num,
    ]);
  }

  
  public static function show($series_id, $season_num, $id)
  {
    
    return view('episode', [
      'episode' => Episode::findOrFail($id)
    ]);
    
  }
}
