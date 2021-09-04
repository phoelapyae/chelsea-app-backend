<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\FootballMatch;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\LeagueTableResource;
use App\Http\Resources\MatchResource;
use App\Http\Resources\NewDetailResource;
use App\Http\Resources\NewsResource;
use App\LeagueTable;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->has('category_id') ? $request->query('category_id') : 1;
        $category = Category::find($category_id);
        $news = $category->news()->latest()->paginate();
        return NewsResource::collection($news);
    }

    public function getNewsDetail(Request $request)
    {
        $id = $request->has('id') ? $request->query('id') : 1;
        $news = News::find($id);
        if ($news) {
            return new NewDetailResource($news);
        } else {
            return response()->json(['message' => 'There is no data for this page'], 422);
        }
    }

    public function getCategories()
    {
        $news = Category::get();
        return CategoryResource::collection($news);
    }

    public function latestShow()
    {
        $news = News::take(5)->get();
        $latest_news = News::where('category_id', 1)->take(3)->get();
        $last_match = FootballMatch::where('match_type_id', 2)->latest()->first();
        $next_match = FootballMatch::where('match_type_id', 1)->latest()->first();
        $league_tables = LeagueTable::take(3)->get();

        $data = [
            'news' => NewsResource::collection($news),
            'latest_news' => NewsResource::collection($latest_news),
            'last_match' => new MatchResource($last_match),
            'next_match' => new MatchResource($next_match),
            'league_tables' => LeagueTableResource::collection($league_tables)
        ];

        if ($data) {
            return response()->json(['data' => $data], 200);
        } else {
            return response()->json(['message' => 'There is no data for this page!'], 422);
        }
    }
}
