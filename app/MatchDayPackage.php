<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchDayPackage extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function packageImages()
    {
        return $this->hasMany('App\MatchdayPackageImage');
    }

    public function matches()
    {
        return $this->belongsToMany('App\FootballMatch', 'match_day_package_football_matches', 'match_day_package_id', 'match_id');
    }

    public function benefits()
    {
        return $this->belongsToMany('App\Benefit', 'match_day_package_benefits', 'match_day_package_id', 'benefit_id');
    }
}
