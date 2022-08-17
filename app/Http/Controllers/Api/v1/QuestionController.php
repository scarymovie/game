<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\QuestionResource;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    public function show(Category $category): JsonResponse
    {
        $questions = Question::where('category_id', $category->id)
            ->inRandomOrder()
            ->get();
        return response()->json(QuestionResource::collection($questions));
    }

    public function getUserQuestions(): JsonResponse
    {
//        $user_id = Auth::id();
        $user_id = 13;

        $questions = Question::where('user_id', $user_id)->paginate(2);
        return response()->json($questions)->setStatusCode(Response::HTTP_OK);
    }
}
