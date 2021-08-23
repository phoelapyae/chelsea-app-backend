<?php

namespace App\Http\Controllers\Api;

use App\FootballMatch;
use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use App\Http\Resources\MatchTypeResource;
use App\MatchType;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function getMatchTypes()
    {
        $types = MatchType::get();
        return MatchTypeResource::collection($types);
    }

    public function getMatches(Request $request)
    {
        if ($request->has('match_type_id')) {
            $match_type_id = $request->query('match_type_id');
        }

        $match_types = MatchType::find($match_type_id);

        $matches = $match_types->matches;
        return MatchResource::collection($matches);
    }
}
