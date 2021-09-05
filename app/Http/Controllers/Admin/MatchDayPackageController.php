<?php

namespace App\Http\Controllers\Admin;

use App\FootballMatch;
use App\Http\Controllers\Controller;
use App\Http\Requests\MatchDayPackageRequest;
use App\MatchDayPackage;
use App\MatchDayPackageFootballMatch;
use App\MatchdayPackageImage;
use Illuminate\Http\Request;

class MatchDayPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = MatchDayPackage::paginate();
        return view('admin.matchday-packages.index', [
            'packages' => $packages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matches = FootballMatch::with('opponent', 'competition')->where('place', 'HOME')->get();
        return view('admin.matchday-packages.create', [
            'matches' => $matches
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatchDayPackageRequest $request)
    {
        $data = $request->validated();
        $cover_image = uploadFile($data['cover_image'], "/packages/");
        $bg_image = uploadFile($data['bg_image'], "/packages/");
        $data['cover_image'] = $cover_image;
        $data['bg_image'] = $bg_image;

        $package = MatchDayPackage::create([
            'cover_image' => $data['cover_image'],
            'bg_image' => $data['bg_image'],
            'name' => $data['name'],
            'title' => $data['title'],
            'price' => $data['price'],
            'limit_count' => $data['limit_count'],
            'short_description' => $data['short_description'],
            'description' => $data['description']
        ]);

        foreach ($data['matches_id'] as $id) {
            MatchDayPackageFootballMatch::create([
                'match_day_package_id' => $package->id,
                'match_id' => $id
            ]);
        }
        foreach ($data['package_images'] as $image) {
            $image = uploadFile($image, "/packages/");
            MatchdayPackageImage::create([
                'match_day_package_id' => $package->id,
                'image' => $image
            ]);
        }
        return redirect()->route('match-day-packages.index');
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
