<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->limit;
        $categories = Category::query()->inRandomOrder()->limit($limit)->get();
        return response()->json(CategoryResource::collection($categories));
    }
}
