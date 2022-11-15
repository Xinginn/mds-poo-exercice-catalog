<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function movies(){
        return $this->belongsToMany(Movie::class, 'movies_genres');
    }

    public function series(){
      return $this->belongsToMany(Series::class, 'series_genres');
  }
}
