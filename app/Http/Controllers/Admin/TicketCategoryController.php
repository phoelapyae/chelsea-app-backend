<?php

namespace App\Http\Controllers\Admin;

use App\FootballMatch;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketCategoryRequest;
use App\MatchTicketCategory;
use App\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket_categories = TicketCategory::get();
        return view('admin.ticket-categories.index', [
            'ticket_categories' => $ticket_categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matches = FootballMatch::where('place', 'HOME')->get();
        $ticket_status = config('form.ticket_status');

        return view('admin.ticket-categories.create', [
            'matches' => $matches,
            'ticket_status' => $ticket_status
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketCategoryRequest $request)
    {
        $data = $request->validated();
        $ticket = TicketCategory::create([
            'name' => $data['name'],
            'date' => $data['date'],
            'status' => $data['status'],
            'limit_count' => $data['limit_count'],
        ]);
        foreach ($data['matches_id'] as $id) {
            MatchTicketCategory::create([
                'match_id' => $id,
                'ticket_category_id' => $ticket->id
            ]);
        }
        return redirect()->route('ticket-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
