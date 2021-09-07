<?php

namespace App\Http\Controllers\Api;

use App\Benefit;
use App\ClubCategory;
use App\FootballMatch;
use App\Http\Controllers\Controller;
use App\Http\Resources\BenefitResource;
use App\Http\Resources\ClubCategoryResource;
use App\Http\Resources\MatchResource;
use App\Http\Resources\PackageResource;
use App\Http\Resources\TicketInfoResource;
use App\Http\Resources\TicketTypeResource;
use App\MatchDayPackage;
use App\TicketCategory;
use App\TicketInfo;
use App\TicketType;
use Illuminate\Http\Request;

class TicketInfoController extends Controller
{
    public function getTicketTypes()
    {
        $types = TicketType::get();
        return TicketTypeResource::collection($types);
    }

    public function getTicketInfos(Request $request)
    {
        $ticket_type = TicketType::find($request->ticket_type_id);
        $ticket_infos = $ticket_type->ticketInfo()->latest()->paginate();
        return TicketInfoResource::collection($ticket_infos);
    }

    public function getTickets()
    {
        $ticket_infos = TicketInfo::where('ticket_type_id', 2)
            ->take(6)
            ->latest()
            ->get();

        $matches = FootballMatch::where('place', 'HOME')->get();

        $data = [
            'matches' => MatchResource::collection($matches),
            'ticket_infos' => TicketInfoResource::collection($ticket_infos)
        ];
        return response()->json(['data' => $data]);
    }

    public function buyTickets()
    {
        $matches = FootballMatch::where('place', 'HOME')->get();
        return MatchResource::collection($matches);
    }

    public function buyPackages()
    {
        $packages = MatchDayPackage::get();
        return PackageResource::collection($packages);
    }

    public function getClubCategories()
    {
        $categories = ClubCategory::get();
        return ClubCategoryResource::collection($categories);
    }

    public function getBenefits()
    {
        $benefits = Benefit::get();
        return BenefitResource::collection($benefits);
    }
}
