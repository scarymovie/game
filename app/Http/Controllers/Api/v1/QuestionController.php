<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsRequest;
use App\Http\Resources\Api\v1\QuestionResource;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function show(Category $category): JsonResponse
    {
        $questions = Question::where('category_id', $category->id)
            ->inRandomOrder()
            ->get();
        return response()->json(QuestionResource::collection($questions));
    }

    public function index(): JsonResponse
    {
        $user_id = Auth::id();
//        dd(Auth::id());
//        $user_id = 13;

        $questions = Question::where('user_id', $user_id)->with('category')->orderByDesc('id')->paginate(10);
        return response()->json($questions)->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\QuestionsRequest $questionsRequest
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(QuestionsRequest $questionsRequest): JsonResponse
    {
//        dd($questionsRequest->all());

        $validated = $questionsRequest->validated();

        $question = Question::create([
            'name' => Str::ucfirst($validated['name']),
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id()
        ]);
        return response()->json(new QuestionResource($question));
    }
}
