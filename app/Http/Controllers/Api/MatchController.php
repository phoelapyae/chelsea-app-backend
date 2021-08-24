<?php

namespace App\Http\Controllers\Api;

use App\FootballMatch;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeagueTableResource;
use App\Http\Resources\MatchResource;
use App\Http\Resources\MatchTypeResource;
use App\LeagueTable;
use App\MatchType;
use App\News;
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

        if ($match_type_id == 1 || $match_type_id == 2) {
            $matches = $match_types->matches;
        } else {
        }

        return MatchResource::collection($matches);
    }

    public function getLeagueTables()
    {
        $tables = LeagueTable::get();
        return LeagueTableResource::collection($tables);
    }
}
