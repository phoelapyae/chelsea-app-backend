<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function getTeams()
    {
        $teams = Team::get();
        return TeamResource::collection($teams);
    }
}
