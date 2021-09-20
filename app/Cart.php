<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function package(){
        return $this->belongsTo('App\MatchDayPackage');
    }

    public function match(){
        return $this->belongsTo('App\FootballMatch');
    }
}
