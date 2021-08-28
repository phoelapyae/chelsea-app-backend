<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Http\Resources\TeamDetailResource;
use App\Http\Resources\TeamResource;
use App\Http\Resources\TeamTypeResource;
use App\Http\Resources\WorkTypeResource;
use App\Position;
use Illuminate\Http\Request;
use App\Team;
use App\TeamType;
use App\WorkType;
use Aws\Result;

class TeamController extends Controller
{
    public function getTeams(Request $request)
    {
        $team_type_id = $request->has('team_type_id') ? $request->query('team_type_id') : 1;

        $work_type_id = $request->has('work_type_id') ? $request->query('work_type_id') : 1;
        $teams = Team::where('team_type_id', $team_type_id)->where('work_type_id', $work_type_id)->get();

        $position_ids = collect($teams)->map(function ($team) {
            return $team->position->id;
        });
        $position_ids->unique()->values()->all();
        $positions = Position::whereIn('id', $position_ids)->get();

        $data = [
            'teams' => TeamResource::collection($teams),
            'positions' => PositionResource::collection($positions)
        ];

        return response()->json(['data' => $data], 200);
    }

    public function getTeamDetail(Request $request)
    {
        $id = $request->has('id') ? $request->query('id') : 1;
        $team = Team::find($id);
        if ($team) {
            return new TeamDetailResource($team);
        } else {
            return response()->json(['message' => 'There is no data for this page.'], 422);
        }
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
        $positions = Position::get();
        return PositionResource::collection($positions);
    }
}
