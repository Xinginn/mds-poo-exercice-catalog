<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
  public static function list(Request $request) {
    $titleType = $request->query('titleType');
    $titleDBLabel = $request->query('titleDBLabel');
    $itemsPerPage = 20;
    $pageQuery = $request->query('page', 1);
    $criteriaQuery = $request->query('order_by','startYear');
    $orderQuery = $request->query('order', 'desc');
    $genreFilter = $request->query('genre', null);

    return view($titleType, [
      'data' => Title::where('titleType', $titleDBLabel)
        ->when($genreFilter != null, function($query) use($request) {
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

  public static function getSingle($id) {
    return Title::findOrFail($id);
  }

  public static function getRandom($titleDBLabel) {
    return Title::where('titleType', 'LIKE', '%'.$titleDBLabel.'%')->inRandomOrder()->whereNotNull('poster')->first();
  }

}
