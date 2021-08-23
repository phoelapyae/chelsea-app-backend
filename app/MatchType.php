<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchType extends Model
{
    /**
     * Relationships
     */
    public function matches()
    {
        return $this->hasMany('App\FootballMatch');
    }
}
