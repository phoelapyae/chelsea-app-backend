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

    public function matchDayPackages()
    {
        return $this->belongsToMany('App\MatchDayPackage', 'match_day_package_football_matches', 'match_id', 'match_day_package_id');
    }
}
