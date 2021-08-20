<?php

namespace App\Http\Controllers\Api;

use App\FootballMatch;
use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function getMatches()
    {
        $matches = FootballMatch::paginate(7);
        return MatchResource::collection($matches);
    }
}
