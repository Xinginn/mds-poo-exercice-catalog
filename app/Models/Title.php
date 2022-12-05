<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
  use HasFactory;

  /*
  public function genres(){
    return $this->belongsToMany(Genre::class, 'titles_genres');
  }
  */

  public function episodes(){
    return $this->belongsToMany(Title::class, 'titles_episodes');
  }
}
