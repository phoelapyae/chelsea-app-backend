<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Http\Resources\TeamResource;
use App\Http\Resources\TeamTypeResource;
use App\Http\Resources\WorkTypeResource;
use App\Position;
use Illuminate\Http\Request;
use App\Team;
use App\TeamType;
use App\WorkType;

class TeamController extends Controller
{
    public function getTeams(Request $request)
    {
        $team_type_id = $request->has('team_type_id') ? $request->query('team_type_id') : 1;

        $work_type_id = $request->has('work_type_id') ? $request->query('work_type_id') : 1;
        $teams = Team::where('team_type_id', $team_type_id)->where('work_type_id', $work_type_id)->get();
        return TeamResource::collection($teams);
    }

    public function teamTypes()
    {
        $types = TeamType::get();
        return TeamTypeResource::collection($types);
    }

    public function workTypes()
    {
        $types = WorkType::get();
        return WorkTypeResource::collection($types);
    }

    public function getPositions()
    {
        $positions = Position::whereBetween('id', [1, 4])->get();
        return PositionResource::collection($positions);
    }
}
