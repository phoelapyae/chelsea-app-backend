<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function position()
    {
        return $this->belongsTo('App\Position');
    }

    public function workType()
    {
        return $this->belongsTo('App\WorkType');
    }

    public function nation()
    {
        return $this->belongsTo('App\Nation');
    }

    public function teamType()
    {
        return $this->belongsTo('App\TeamType');
    }
}
