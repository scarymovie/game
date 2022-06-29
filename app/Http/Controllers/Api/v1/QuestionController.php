<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\QuestionResource;
use App\Models\Category;
use App\Models\Question;

class QuestionController extends Controller
{
    public function show(Category $category)
    {
        $questions = Question::where('category_id', $category->id)
            ->limit(2000)
            ->get();
        return response()->json(QuestionResource::collection($questions));
    }
}
