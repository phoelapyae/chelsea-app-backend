<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeagueTable extends Model
{
    /**
     * Relationships
     */
    public function opponent()
    {
        return $this->belongsTo('App\Opponent');
    }
}
