<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketInfoRequest;
use App\TicketInfo;
use App\TicketType;
use Illuminate\Http\Request;

class TicketInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketInfos = TicketInfo::latest()->paginate();
        return view('admin.ticket-infos.index', compact('ticketInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticketInfoTypes = TicketType::get();
        $ticketInfoTypes = collect($ticketInfoTypes)->filter(function ($info) {
            if ($info->id === 2 || $info->id === 3) {
                return $info;
            }
        });

        return view('admin.ticket-infos.create', compact('ticketInfoTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketInfoRequest $request)
    {
        $data = $request->validated();
        $cover_image = uploadFile($data['cover_image'], "/ticket-infos/");
        $bg_image = uploadFile($data['bg_image'], "/ticket-infos/");
        $data['cover_image'] = $cover_image;
        $data['bg_image'] = $bg_image;
        TicketInfo::create($data);
        return redirect()->route('chelsea-ticket-infos.index');
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
