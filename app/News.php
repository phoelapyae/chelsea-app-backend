<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
