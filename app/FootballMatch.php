<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    protected $guarded = [];
    protected $table = 'matches';

    /**
     * Relatinships
     */
    public function opponent()
    {
        return $this->belongsTo('App\Opponent');
    }

    public function competition()
    {
        return $this->belongsTo('App\Competition');
    }
}
