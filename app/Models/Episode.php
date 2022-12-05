<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Title
{
    use HasFactory;

    public function series(){
        return $this->belongsTo(Series::class);
    }
}
