<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Models\Question;

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


Route::get('/', [QuestionController::class, 'showAll']);

Route::get('/ask', function () {
    return view('ask_question');
});

Route::get('/questions/{id}', function ($id) {
    $q = Question::with('answers')->findOrFail($id);
    return view('question', ['question' => $q]);
});

Route::post('/ask-question', [QuestionController::class, 'add']);
Route::post('/answers/{id}', [AnswerController::class, 'addAns']);
