<?php

use App\Http\Controllers\QuestionsController;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $questions = Question::where('user_id', Auth::id())->get();
    $categories = Category::all();
    return  view('dashboard', compact('questions', 'categories'));
})->middleware(['auth'])->name('dashboard');

Route::resource('questions', QuestionsController::class);

require __DIR__.'/auth.php';
