<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketInfoResource;
use App\Http\Resources\TicketTypeResource;
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
}
