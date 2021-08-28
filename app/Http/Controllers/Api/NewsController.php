<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\NewDetailResource;
use App\Http\Resources\NewsResource;
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
}
